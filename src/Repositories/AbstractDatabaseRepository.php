<?php


namespace App\Repositories;


class AbstractDatabaseRepository
{
    protected function query(string $query, array $arguments): array
    {
        // todo implement
        return [];
    }

    protected function insert(string $query, array $arguments): int
    {
        // todo implement
        return rand(1, 10000);
    }
}
