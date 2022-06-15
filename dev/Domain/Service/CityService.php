<?php


namespace Dev\Domain\Service;

use Dev\Infrastructure\Model\DoctorCategory;
use Dev\Infrastructure\Model\City;
use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\CityRepository;

class CityService extends AbstractService
{
    /**
     * UserService constructor.
     * @param CityRepository $repository
     */
    public function __construct(CityRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filters
     * @return Object of services
     */
    public function index(array $filters = []): object
    {
        if (isset($filters['limit'])) {
            return $this->repository->paginate($filters['limit']);
        }
        return $this->repository->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return Object ob category service
     */
    public function store(array $data): object
    {
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param DoctorCategory $city
     * @return AbstractRepository
     */
    public function update(array $data, City $city)
    {
        $this->repository = $city;
        $this->repository->update($data);
        return $this->repository;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return boolean true or false
     */
    public function destroy(int $id): bool
    {
        return $this->repository->where('id', $id)->delete();
    }


}
