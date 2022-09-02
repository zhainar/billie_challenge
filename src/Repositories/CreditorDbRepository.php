<?php


namespace App\Repositories;


use App\Domains\FactoringDomain\Entities\Creditor;
use App\Domains\FactoringDomain\Repositories\CreditorRepository;
use App\Exceptions\EntityNotFoundException;

class CreditorDbRepository extends AbstractDatabaseRepository implements CreditorRepository
{
    public function findById(int $id): Creditor
    {
        $data = $this->query('select * from companies where id = ?', [$id]);

        if (empty($data)) {
            throw new EntityNotFoundException();
        }

        $company = new Creditor();
        $company->id = $data['id'];
        $company->name = $data['name'];

        return $company;
    }
}
