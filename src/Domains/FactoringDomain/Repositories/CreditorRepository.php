<?php


namespace App\Domains\FactoringDomain\Repositories;


use App\Domains\FactoringDomain\Entities\Creditor;

interface CreditorRepository
{
    public function findById(int $id): Creditor;
}
