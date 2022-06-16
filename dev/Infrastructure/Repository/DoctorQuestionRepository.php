<?php

namespace Dev\Infrastructure\Repository;


use App\Models\DoctorQuestion;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AreaRepository
 * @package Dev\Infrastructure\Repository
 */
class DoctorQuestionRepository extends AbstractRepository
{
    /**
     * AreaRepository constructor.
     * @param DoctorQuestion $model
     */
    public function __construct(DoctorQuestion $model)
    {
        parent::__construct($model);
    }

}
