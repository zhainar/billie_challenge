<?php


namespace App\Domains\CompanyDomain\Services;


use App\Domains\CompanyDomain\Entities\Company;
use App\Domains\CompanyDomain\Repositories\CompanyRepository;
use App\Exceptions\EntityValidationException;

class CompanyService
{
    public function __construct(private CompanyRepository $repository)
    {
    }

    public function register(array $data): Company
    {
        $validationService = new ValidationService();
        $errors = $validationService->validateRegistration($data);

        if ($errors) {
            throw new EntityValidationException("Registration errors:\n" . implode("\n", $errors));
        }

        $company = new Company();
        $company->name = $data['name'];

        $this->repository->save($company);

        return $company;
    }
}
