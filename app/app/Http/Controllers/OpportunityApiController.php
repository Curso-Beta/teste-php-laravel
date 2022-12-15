<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateOpportunityRequest;
use App\Http\Requests\Paginate\PaginateOpportunityRequest;
use App\Http\Requests\Update\UpdateOpportunityRequest;
use App\Http\Resources\OpportunityResource;
use App\Models\Opportunity;
use App\Services\OpportunityServiceInterface;
use Illuminate\Http\Response;

class OpportunityApiController extends Controller
{
    public function __construct(OpportunityServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/opportunities",
     *      operationId="getOpportunitiesList",
     *      tags={"Opportunities"},
     *      summary="Get list of opportunities",
     *      description="Returns list of opportunities",
     *      @OA\Parameter(ref="#/components/parameters/page"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OpportunityResourceCollection")
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
    public function index(PaginateOpportunityRequest $request)
    {
        $data = $request->validated();
        return (OpportunityResource::collection($this->service->list($data)))
        ->additional([
            'meta' => [
                'columns' => Opportunity::VISIBLE,
                'model' => 'opportunity'
                ]
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/opportunities",
     *      operationId="storeOpportunity",
     *      tags={"Opportunities"},
     *      summary="Store new opportunity",
     *      description="Returns opportunity data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateOpportunityRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OpportunityResource")
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
    public function store(CreateOpportunityRequest $request)
    {
        $data = $request->validated();
        return response(new OpportunityResource($this->service->createOpportunity($data)), Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/opportunities/{id}",
     *      operationId="getOpportunityById",
     *      tags={"Opportunities"},
     *      summary="Get opportunity information",
     *      description="Returns opportunity data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Opportunity id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OpportunityResource")
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
    public function show(Opportunity $opportunity)
    {
        return response(new OpportunityResource($opportunity), Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *      path="/api/opportunities/{id}",
     *      operationId="updateOpportunity",
     *      tags={"Opportunities"},
     *      summary="Update existing opportunity",
     *      description="Returns updated opportunity data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Opportunity id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateOpportunityRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OpportunityResource")
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
    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        $data = $request->validated();
        return response(new OpportunityResource($this->service->updateOpportunity($opportunity, $data)), Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/api/opportunities/{id}",
     *      operationId="deleteOpportunity",
     *      tags={"Opportunities"},
     *      summary="Delete existing opportunity",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Opportunity id",
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
    public function destroy(Opportunity $opportunity)
    {
        Opportunity::destroy($opportunity->id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
