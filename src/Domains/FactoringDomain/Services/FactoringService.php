<?php


namespace App\Domains\FactoringDomain\Services;


use App\Domains\FactoringDomain\Entities\Factoring;
use App\Domains\FactoringDomain\Entities\FactoringApplication;
use App\Domains\FactoringDomain\Repositories\ApplicationRepository;

class FactoringService
{
    public function __construct(
        private ApplicationRepository $applicationRepository
    )
    {
    }

    public function verifyApplication(int $applicationId): FactoringApplication
    {
        /**
         * Must be retrieved from repository
         */
        $factoring = new Factoring();
        $application = $this->applicationRepository->findById($applicationId);
        $application = $factoring->validateApplication($application);
        $this->applicationRepository->save($application);

        return $application;
    }
}
