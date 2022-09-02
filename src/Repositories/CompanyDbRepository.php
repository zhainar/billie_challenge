<?php


namespace App\Repositories;


use App\Domains\CompanyDomain\Entities\Company;
use App\Domains\CompanyDomain\Repositories\CompanyRepository;
use App\Exceptions\EntityNotFoundException;

class CompanyDbRepository extends AbstractDatabaseRepository implements CompanyRepository
{
    public function findById(int $id): Company
    {
        $data = $this->query('select * from companies where id = ?', [$id]);

        if (empty($data)) {
            throw new EntityNotFoundException();
        }

        $company = new Company();
        $company->id = $data['id'];
        $company->name = $data['name'];

        return $company;
    }

    public function save(Company $company): Company
    {
        $id = $this->insert('insert into companies (name) values (?)', [
            $company->name
        ]);

        $company->id = $id;

        return $company;
    }
}
