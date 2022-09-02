<?php


namespace App\Domains\FactoringDomain\Entities;


use App\Domains\CompanyDomain\Entities\Company;
use App\Domains\FactoringDomain\ValueObjects\ApplicationStatus;

class Factoring extends Company
{
    const LIMIT = 100;

    public function validateApplication(FactoringApplication $application): FactoringApplication
    {
        // todo here we validate application and set status
        if ($application->creditor()->countOfUnpaidInvoices() > self::LIMIT) {
            $application->statusId = ApplicationStatus::REJECTED;
        } else {
            $application->statusId = ApplicationStatus::ACCEPTED;
        }

        return $application;
    }
}
