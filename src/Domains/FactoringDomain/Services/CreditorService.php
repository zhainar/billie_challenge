<?php


namespace App\Domains\FactoringDomain\Services;


use App\Domains\FactoringDomain\Entities\Invoice;
use App\Domains\FactoringDomain\Repositories\CreditorRepository;
use App\Domains\FactoringDomain\Repositories\InvoiceRepository;
use App\Exceptions\EntityNotFoundException;

class CreditorService
{
    public function __construct(private InvoiceRepository $invoiceRepository, private CreditorRepository $creditorRepository)
    {
    }

    public function issueInvoice(int $sellerId, array $data): Invoice
    {
        $creditor = $this->creditorRepository->findById($sellerId);
        $invoice = $creditor->issueInvoice($data['buyerId'], $data);

        $this->invoiceRepository->save($invoice);

        return $invoice;
    }

    public function sellInvoice(int $sellerId, int $invoiceId)
    {
        $creditor = $this->creditorRepository->findById($sellerId);
        $invoice = $creditor->findInvoice($invoiceId);

        if (empty($invoice)) {
            throw new EntityNotFoundException();
        }

        $application = $creditor->sellInvoice($invoice);
        // todo save application

        return $application;
    }
}
