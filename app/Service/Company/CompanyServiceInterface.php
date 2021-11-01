<?php

namespace App\Service\Company;

/**
 * Interface CompanyServiceInterface
 * @package App\Service\Company
 */
interface CompanyServiceInterface
{

    /**
     * @param int $id
     */
    public function getCompanyForUser(int $id);


    /**
     * @param array $createCompany
     */
    public function createCompany(array $createCompany);

}
