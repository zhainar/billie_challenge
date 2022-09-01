<?php


namespace App\Repositories;


use App\Domains\CompanyDomain\Entities\Company;
use App\Domains\CompanyDomain\Repositories\CompanyRepository;

class CompanyDbRepository extends AbstractDatabaseRepository implements CompanyRepository
{
    public function findById(int $id): Company
    {
        // TODO: Implement findById() method.
    }

    public function save(Company $company): Company
    {
        return $company;
    }
}
