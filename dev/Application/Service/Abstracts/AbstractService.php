<?php

namespace Dev\Application\Service\Abstracts;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AbstractService
 * @package Dev\Domain\Service\Abstracts
 */
class AbstractService
{
    /**
     * @var AbstractRepository
     */
    protected $repository;
}
