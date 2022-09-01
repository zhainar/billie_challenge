<?php


namespace App\Domains\CompanyDomain\Repositories;


use App\Domains\CompanyDomain\Entities\Company;

interface CompanyRepository
{
    public function findById(int $id): Company;
    public function save(Company $company): Company;
}
