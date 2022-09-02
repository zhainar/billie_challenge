<?php


namespace App\BackgroundServices;

use App\Domains\FactoringDomain\Services\FactoringService;
use App\Events\FactoringApplicationVerified;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * This is daemon service working in background and verifying sell application
 *
 * Class FactoringApplicationsVerificationService
 * @package App\BackgroundServices
 */
class FactoringApplicationsVerificationService
{
    public function __construct(
        private FactoringService $factoringService,
        private EventDispatcher $dispatcher
    )
    {
    }

    public function run()
    {
        while ($appId = $this->nextApplicationId()) {
            $application = $this->factoringService->verifyApplication($appId);

            /**
             * Here we can send email or push message to creditor
             */
            $this->dispatcher->dispatch(new FactoringApplicationVerified($application));
        }
    }

    /**
     * Return application ID from message bus
     *
     * @return int
     */
    private function nextApplicationId(): int
    {
        // todo implement
        return rand(10000, 99999999);
    }
}
