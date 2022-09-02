<?php


namespace App\Domains\FactoringDomain\Repositories;


use App\Domains\FactoringDomain\Entities\FactoringApplication;

interface ApplicationRepository
{
    public function findById(int $id): FactoringApplication;
    public function save(FactoringApplication $invoice): FactoringApplication;
}
