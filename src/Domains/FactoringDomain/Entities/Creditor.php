<?php


namespace App\Domains\FactoringDomain\Entities;


use App\Domains\CompanyDomain\Entities\Company;
use App\Domains\FactoringDomain\DataObjects\InvoiceDetail;

class Creditor extends Company
{
    /**
     * @var array|Invoice[]
     */
    public array $invoices = [];

    public function issueInvoice(int $buyerId, array $details): Invoice
    {
        $invoice = new Invoice();
        $invoice->sellerId = $this->id;
        $invoice->buyerId = $buyerId;

        foreach ($details as $detail) {
            $invoiceDetail = new InvoiceDetail();
            $invoice->addDetail($invoiceDetail);
        }

        $this->invoices[] = $invoice;

        return $invoice;
    }

    public function findInvoice(int $invoiceId): ?Invoice
    {
        foreach ($this->invoices as $invoice) {
            if ($invoice->id == $invoiceId) {
                return $invoice;
            }
        }

        return null;
    }

    public function sellInvoice(Invoice $invoice)
    {
        /**
         * no validation here
         * just create application
         */
        $application = new FactoringApplication();
        $application->invoiceId = $invoice->id;
        return $application;
    }

    public function countOfUnpaidInvoices(): int
    {
        $total = 0;

        foreach ($this->invoices as $invoice) {
            if (!$invoice->status()->isPaid()) {
                $total++;
            }
        }

        return $total;
    }
}
