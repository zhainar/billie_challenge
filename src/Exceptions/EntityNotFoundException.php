<?php


namespace App\Exceptions;


class EntityNotFoundException extends \Exception
{
    protected $code = 404;
}
