<?php


namespace App\Events;


use App\Domains\FactoringDomain\Entities\FactoringApplication;
use Symfony\Contracts\EventDispatcher\Event;

class FactoringApplicationVerified extends Event
{
    public function __construct(
        private FactoringApplication $app
    )
    {
    }

    /**
     * @return FactoringApplication
     */
    public function getApp(): FactoringApplication
    {
        return $this->app;
    }
}
