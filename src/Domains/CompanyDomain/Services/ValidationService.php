<?php


namespace App\Domains\CompanyDomain\Services;

class ValidationService
{
    public function validateRegistration(array $data): array
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors[] = "Name couldn't be empty";
        }

        if (mb_strlen($data['name']) < 3) {
            $errors[] = "Name is too short";
        }

        return $errors;
    }
}
