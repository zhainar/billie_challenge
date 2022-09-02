<?php


namespace App\Domains\FactoringDomain\Entities;


use App\Domains\CompanyDomain\Entities\Company;

class Debtor extends Company
{
    public function addMoney(int $amount)
    {
        // todo implement
    }

    public function payInvoice(int $invoiceId)
    {
        // todo implement
        // todo change invoice status to PAID
    }
}
