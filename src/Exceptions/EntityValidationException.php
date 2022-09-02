<?php


namespace App\Exceptions;


class EntityValidationException extends \Exception
{
    protected $code = 400;
}
