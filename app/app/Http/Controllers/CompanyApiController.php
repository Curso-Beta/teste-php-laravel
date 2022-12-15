<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateCompanyRequest;
use App\Http\Requests\Paginate\PaginateCompanyRequest;
use App\Http\Requests\Update\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyServiceInterface;
use Illuminate\Http\Response;

class CompanyApiController extends Controller
{
    public function __construct(CompanyServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/companies",
     *      operationId="getCompaniesList",
     *      tags={"Companies"},
     *      summary="Get list of companies",
     *      description="Returns list of companies",
     *      @OA\Parameter(ref="#/components/parameters/page"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CompanyResourceCollection")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * ),
     */
    public function index(PaginateCompanyRequest $request)
    {
        $data = $request->validated();
        return (CompanyResource::collection($this->service->list($data)))
        ->additional([
            'meta' => [
                'columns' => Company::VISIBLE,
                'model' => 'company'
                ]
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/companies",
     *      operationId="storeCompany",
     *      tags={"Companies"},
     *      summary="Store new company",
     *      description="Returns company data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateCompanyRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * ),
     */
    public function store(CreateCompanyRequest $request)
    {
        $data = $request->validated();
        return response(new CompanyResource($this->service->createCompany($data)), Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/companies/{id}",
     *      operationId="getCompanyById",
     *      tags={"Companies"},
     *      summary="Get company information",
     *      description="Returns company data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Company id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * ),
     */
    public function show(Company $company)
    {
        return response(new CompanyResource($company), Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *      path="/api/companies/{id}",
     *      operationId="updateCompany",
     *      tags={"Companies"},
     *      summary="Update existing company",
     *      description="Returns updated company data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Company id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCompanyRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      ),
     * ),
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        return response(new CompanyResource($this->service->updateCompany($company, $data)), Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/api/companies/{id}",
     *      operationId="deleteCompany",
     *      tags={"Companies"},
     *      summary="Delete existing company",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Company id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      ),
     * ),
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
