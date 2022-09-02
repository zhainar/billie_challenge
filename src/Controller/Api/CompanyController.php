<?php


namespace App\Controller\Api;


use App\Domains\CompanyDomain\Services\CompanyService;
use App\Repositories\CompanyDbRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Rest\Route('/api')]
class CompanyController extends AbstractFOSRestController
{
    #[Rest\Post('/company')]
    public function add(Request $request, CompanyDbRepository $repository): JsonResponse
    {
        $service = new CompanyService($repository);
        $data = $request->getContent();
        $companyData = json_decode($data, true) ?: [];

        $company = $service->register($companyData);
        return $this->json($company->serialize());
    }
}
