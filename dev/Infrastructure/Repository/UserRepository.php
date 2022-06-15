<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Model\User;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class UserRepository
 * @package Dev\Infrastructure\Repository
 */
class UserRepository extends AbstractRepository
{
    /**
     * UserRepository constructor.
     * @param Package $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

}
