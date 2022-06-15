<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Model\ContactUs;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class BuildingTypeRepository
 * @package Dev\Infrastructure\Repository
 */
class ContactUsRepository extends AbstractRepository
{
    /**
     * ContactUsRepository constructor.
     * @param ContactUs $model
     */
    public function __construct(ContactUs $model)
    {
        parent::__construct($model);
    }

}
