<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Model\Country;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class CountryRepository
 * @package Dev\Infrastructure\Repository
 */
class CountryRepository extends AbstractRepository
{
    /**
     * CountryRepository constructor.
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }

}
