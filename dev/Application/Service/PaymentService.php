<?php


namespace Dev\Application\Service;

use Dev\Application\Exceptions\InvalidDataException;
use Dev\Application\Service\Abstracts\AbstractService;
use Dev\Application\Utility\PaymentMethod;
use Dev\Infrastructure\Repository\HyperPayRepository;

class PaymentService extends AbstractService
{
    /**
     * PaymentService constructor.
     * @param HyperPayRepository $repository
     */
    public function __construct(HyperPayRepository $repository)
    {
        $this->repository = $repository;
    }

    public function prepare(string $paymentMethod, string $currency, float $amount, string $paymentType,$transactionId,$customerEmail)
    {

        $entityId = PaymentMethod::getEntityId($paymentMethod);
        if (is_null($entityId)) {
            throw new InvalidDataException('Undefined payment method');
        }
        return $this->repository->prepare($entityId, $currency, $amount, $paymentType,$transactionId,$customerEmail);
    }

    public function getPaymentStatus(string $paymentMethod, string $resource)
    {
        $entityId = PaymentMethod::getEntityId($paymentMethod);
        return $this->repository->getPaymentStatus($entityId, $resource);
    }
}
