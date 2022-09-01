<?php


namespace App\Controller\Api;


use App\Domains\CompanyDomain\Services\CompanyService;
use App\Exceptions\EntityValidationException;
use App\Repositories\CompanyDbRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Rest\Route('/api')]
class CompanyController extends AbstractFOSRestController
{
    #[Rest\Post('/company')]
    public function add(Request $request): JsonResponse
    {
        $repository = new CompanyDbRepository();
        $service = new CompanyService($repository);
        $data = $request->getContent();
        $companyData = json_decode($data, true) ?: [];

        try {
            $company = $service->createCompany($companyData);
            return $this->json($company->serialize());
        } catch (EntityValidationException $exception) {
            return $this->json([
                'message' => $exception->getMessage()
            ], 400);
        } catch (\Exception $exception) {
            return $this->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
