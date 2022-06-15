<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Model\Rating;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AreaRepository
 * @package Dev\Infrastructure\Repository
 */
class RatingRepository extends AbstractRepository
{
    /**
     * AreaRepository constructor.
     * @param Rating $model
     */
    public function __construct(Rating $model)
    {
        parent::__construct($model);
    }

}
