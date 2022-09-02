<?php


namespace App\Domains\FactoringDomain\Entities;


use App\Domains\FactoringDomain\ValueObjects\ApplicationStatus;

class FactoringApplication
{
    public int $invoiceId;
    public int $statusId = ApplicationStatus::VERIFYING;

    public function invoice(): Invoice
    {
        /**
         * here must be implemented retrieving data from repository
         */
        $invoice = new Invoice();
        $invoice->id = $this->invoiceId;

        return $invoice;
    }

    public function creditor(): Creditor
    {
        /**
         * here must be implemented retrieving data from repository
         */
        $creditor = new Creditor();
        $creditor->id = $this->invoice()->sellerId;

        return $creditor;
    }

    public function serialize(): array
    {
        return [
            'status' => $this->statusId
        ];
    }
}
