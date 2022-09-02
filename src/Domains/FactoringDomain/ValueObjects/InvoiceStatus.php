<?php


namespace App\Domains\FactoringDomain\ValueObjects;


class InvoiceStatus
{
    const ISSUED = 1;
    const PAID = 2;

    public function __construct(private int $statusId)
    {
    }

    public function isPaid(): bool
    {
        return $this->statusId == self::PAID;
    }
}
