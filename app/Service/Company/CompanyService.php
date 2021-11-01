<?php

namespace App\Service\Company;

use App\Http\Resources\CompanyByIdResource;
use App\Models\Company;

class CompanyService implements CompanyServiceInterface
{


    /**
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCompanyForUser(int $id)
    {

        return CompanyByIdResource::collection(Company::where('user_id', '=', $id)->paginate());

    }

    /**
     * @param array $companyData
     * @return Company
     */
    public function createCompany(array $companyData)
    {
        $company = new Company();
        $company->title = $companyData['title'];
        $company->description = $companyData['description'];
        $company->phone = $companyData['phone'];
        $company->user_id = auth()->user()->id;
        $company->save();

        return $company;

    }


}
