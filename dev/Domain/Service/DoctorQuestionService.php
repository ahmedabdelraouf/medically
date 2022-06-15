<?php


namespace Dev\Domain\Service;


use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Model\Image;
use Dev\Infrastructure\Model\UserVehicle;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\UserVehicleRepository;

class DoctorQuestionService extends AbstractService
{

    /**
     * UserService constructor.
     * @param UserVehicleRepository $repository
     */
    public function __construct(UserVehicleRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filter
     * @return mixed
     */
    public function index(array $filter = [])
    {
        $userVehicles = $this->repository;
        if (isset($filter['user_id']))
            $userVehicles = $userVehicles->where('user_id', $filter['user_id']);
        return $userVehicles->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return Object ob category service
     */
    public function store(array $data)
    {
        return $this->repository->create($data);
        dd($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param UserVehicle $userVehicle
     * @return AbstractRepository |bool
     */
    public function update(array $data)
    {
        $userVehicle = $this->repository->where('id', $data['user_vehicle_id'])->first();
        unset($data['user_vehicle_id']);
        if (!isset($data['driving_license'])) {
            $data['driving_license'] = $userVehicle->driving_license;
        }
        unset($data['images']);
        if ($userVehicle->update($data)){
            return $userVehicle;
        }
        return false;
    }
//php artisan make:migration add_driving_license_validety_to_user_vehicles_table --table=user_vehicles

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param UserVehicle $userVehicle
     * @return boolean
     */
    public function deleteImages(array $data)
    {
        $userVehicle = $this->repository->where('id', $data['user_vehicle_id'])->first();
        if ($data['user_id'] != $userVehicle->user_id) {
            return false;
        }
        return $userVehicle->images()->whereIn('id', $data['image_ids'])->delete();
    }

    public function getStatistics()
    {
        return[
            'total_vehicles_count'=>$this->repository->count(),
        ];
    }

}
