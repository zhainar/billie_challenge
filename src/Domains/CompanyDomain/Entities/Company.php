<?php


namespace App\Domains\CompanyDomain\Entities;

use JetBrains\PhpStorm\ArrayShape;

class Company
{
    public ?int $id = null;
    public string $name = '';

    #[ArrayShape(['id' => "int|null", 'name' => "string"])]
    public function serialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
