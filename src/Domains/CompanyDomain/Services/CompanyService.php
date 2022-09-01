<?php


namespace App\Domains\CompanyDomain\Services;


use App\Domains\CompanyDomain\Entities\Company;
use App\Domains\CompanyDomain\Repositories\CompanyRepository;

class CompanyService
{
    private CompanyRepository $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCompany(array $data): Company
    {
        $company = Company::create($data);
        $this->repository->save($company);

        return $company;
    }
}
