<?php


namespace App\Domains\CompanyDomain\Services;


use App\Exceptions\EntityValidationException;

class ValidationService
{
    public function validateCreation(array $data)
    {
        if (empty($data['name'])) {
            throw new EntityValidationException("Name couldn't be empty");
        }

        if (mb_strlen($data['name']) < 3) {
            throw new EntityValidationException("Name is too short");
        }
    }
}
