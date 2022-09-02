<?php


namespace App\Controller\Api;

use App\Domains\FactoringDomain\Services\CreditorService;
use App\Events\FactoringApplicationCreated;
use App\Repositories\CreditorDbRepository;
use App\Repositories\InvoiceDbRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Rest\Route('/api')]
class FactoringController extends AbstractFOSRestController
{
    #[Rest\Post('/invoice')]
    public function createInvoice(
        Request $request,
        InvoiceDbRepository $repository,
        CreditorDbRepository $creditorDbRepository
    ): JsonResponse
    {
        /**
         * Here we can use dependency injection, but don't want to get deep into framework details
         */
        $service = new CreditorService($repository, $creditorDbRepository);
        $data = $request->getContent();
        $data = json_decode($data, true) ?: [];

        /**
         * Usually set by gateway service
         */
        $companyId = (int) $request->headers->get('Company-Id');
        $invoice = $service->issueInvoice($companyId, $data);
        return $this->json($invoice->serialize());
    }

    #[Rest\Put('/invoice/{invoiceId}/sell')]
    public function sellInvoice(
        int $invoiceId,
        Request $request,
        EventDispatcher $dispatcher,
        InvoiceDbRepository $repository,
        CreditorDbRepository $creditorDbRepository
    ): JsonResponse
    {
        $service = new CreditorService($repository, $creditorDbRepository);

        /** @var int $companyId Usually set by gateway service */
        $companyId = $request->headers->get('Company-Id');
        $application = $service->sellInvoice($companyId, $invoiceId);

        /**
         * Here we send application to message bus to validate it in background process
         */
        $dispatcher->dispatch(new FactoringApplicationCreated($application));

        return $this->json($application->serialize());
    }

    #[Rest\Put('/invoice/{invoiceId}/paid')]
    public function invoicePaid(
        int $invoiceId,
        Request $request,
        InvoiceDbRepository $repository,
    )
    {
        // todo implement
    }
}
