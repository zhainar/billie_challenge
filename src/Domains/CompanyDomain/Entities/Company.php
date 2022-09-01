<?php


namespace App\Domains\CompanyDomain\Entities;

use App\Domains\CompanyDomain\Services\ValidationService;
use JetBrains\PhpStorm\ArrayShape;

class Company
{
    private ?int $id = null;
    private string $name = '';

    public static function create(array $data): self
    {
        $validationService = new ValidationService();
        $validationService->validateCreation($data);

        $company = new self();
        $company->name = $data['name'];

        return $company;
    }

    #[ArrayShape(['id' => "int|null", 'name' => "string"])]
    public function serialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
