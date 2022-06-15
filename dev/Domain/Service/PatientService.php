<?php


namespace Dev\Domain\Service;


use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Model\UserVehicle;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\PatientRepository;
use Dev\Infrastructure\Repository\UserVehicleRepository;

class PatientService extends AbstractService
{

    /**
     * UserService constructor.
     * @param UserVehicleRepository $repository
     */
    public function __construct(PatientRepository $repository)
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
        if ($userVehicle->update($data)) {
            return $userVehicle;
        }
        return false;
    }

}
