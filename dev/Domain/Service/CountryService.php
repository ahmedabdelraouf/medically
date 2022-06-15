<?php


namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Model\Country;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\CountryRepository;

class CountryService extends AbstractService
{
    /**
     * CountryService constructor.
     * @param CountryRepository $repository
     */
    public function __construct(CountryRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filters
     * @return Object of services
     */
    public function index(array $filters = [])
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
    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Country $country
     * @return AbstractRepository
     */
    public function update(array $data, Country $country)
    {
        $this->repository->where('id', $country->id)->update($data);
        return $this->repository->find($country->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return boolean true or false
     */
    public function destroy(int $id)
    {
        return $this->repository->where('id', $id)->delete();
    }


}
