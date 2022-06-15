<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Model\City;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AreaRepository
 * @package Dev\Infrastructure\Repository
 */
class CityRepository extends AbstractRepository
{
    /**
     * AreaRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

}
