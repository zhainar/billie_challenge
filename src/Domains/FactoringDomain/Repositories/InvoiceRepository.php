<?php


namespace App\Domains\FactoringDomain\Repositories;


use App\Domains\FactoringDomain\Entities\Invoice;

interface InvoiceRepository
{
    public function findById(int $id): Invoice;
    public function save(Invoice $invoice): Invoice;
}
