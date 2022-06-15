<?php

namespace Dev\Infrastructure\Repository;


use App\Models\Area;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AreaRepository
 * @package Dev\Infrastructure\Repository
 */
class AreaRepository extends AbstractRepository
{
    /**
     * AreaRepository constructor.
     * @param Area $model
     */
    public function __construct(Area $model)
    {
        parent::__construct($model);
    }

}
