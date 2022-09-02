<?php


namespace App\Domains\FactoringDomain\DataObjects;


class InvoiceDetail
{
    public string $itemName = '';
    public int $quantity = 1;
    public int $cost = 0;
}
