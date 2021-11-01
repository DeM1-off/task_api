<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Http\Response;
use App\Http\Requests\CompaniesRequest;
use App\Service\Company\CompanyServiceInterface;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{


    /**
     * @var CompanyServiceInterface
     */
    private $companyService;

    /**
     * CompanyController constructor.
     * @param CompanyServiceInterface $companyService
     */
    public function __construct(CompanyServiceInterface $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * @return mixed
     */
    public function getCompanies()
    {

        $company = $this->companyService->getCompanyForUser(auth()->user()->id);

        return $company;

    }

    /**
     * @param CompaniesRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function addCompanies(CompaniesRequest $request)
    {
        $company = $this->companyService->createCompany($request->all());

        return response($company, 201);
    }
}
