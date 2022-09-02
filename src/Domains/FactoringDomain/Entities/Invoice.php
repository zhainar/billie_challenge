<?php


namespace App\Domains\FactoringDomain\Entities;


use App\Domains\FactoringDomain\DataObjects\InvoiceDetail;
use App\Domains\FactoringDomain\ValueObjects\InvoiceStatus;
use JetBrains\PhpStorm\ArrayShape;

class Invoice
{
    public ?int $id = null;
    public ?int $sellerId = null;
    public ?int $buyerId = null;
    /**
     * @var InvoiceDetail[]
     */
    public array $details = [];
    public int $statusId = InvoiceStatus::ISSUED;

    public function addDetail(InvoiceDetail $detail)
    {
        $this->details[] = $detail;
    }

    public function status(): InvoiceStatus
    {
        return new InvoiceStatus($this->statusId);
    }

    #[ArrayShape(['id' => "int|null", 'sellerId' => "int|null", 'buyerId' => "int|null"])]
    public function serialize(): array
    {
        return [
            'id' => $this->id,
            'sellerId' => $this->sellerId,
            'buyerId' => $this->buyerId,
            'statusId' => $this->statusId
        ];
    }
}
