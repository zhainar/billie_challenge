<?php


namespace App\Repositories;


use App\Domains\FactoringDomain\DataObjects\InvoiceDetail;
use App\Domains\FactoringDomain\Entities\Invoice;
use App\Domains\FactoringDomain\Repositories\InvoiceRepository;

class InvoiceDbRepository extends AbstractDatabaseRepository implements InvoiceRepository
{
    public function findById(int $id): Invoice
    {
        // TODO: Implement findById() method.
    }

    public function save(Invoice $invoice): Invoice
    {
        $invoiceId = $this->insert('insert into invoices (seller_id, buyer_id, status_id) values (?, ?, ?)', [
            $invoice->sellerId,
            $invoice->buyerId,
            $invoice->statusId
        ]);

        $invoice->id = $invoiceId;

        foreach ($invoice->details as &$invoiceDetail) {
            $invoiceDetail = $this->saveDetail($invoiceDetail);
        }

        return $invoice;
    }

    protected function saveDetail(InvoiceDetail $invoiceDetail): InvoiceDetail
    {
        // todo implement
        return $invoiceDetail;
    }
}
