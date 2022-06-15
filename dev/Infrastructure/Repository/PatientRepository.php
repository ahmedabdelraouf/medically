<?php

namespace Dev\Infrastructure\Repository;


use App\Models\Patient;
use Dev\Infrastructure\Model\Rating;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AreaRepository
 * @package Dev\Infrastructure\Repository
 */
class PatientRepository extends AbstractRepository
{
    /**
     * AreaRepository constructor.
     * @param Rating $model
     */
    public function __construct(Patient $model)
    {
        parent::__construct($model);
    }

}
