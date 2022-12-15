<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateCandidateRequest;
use App\Http\Requests\Paginate\PaginateCandidateRequest;
use App\Http\Requests\Update\UpdateCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use App\Services\CandidateServiceInterface;
use Illuminate\Http\Response;

class CandidateApiController extends Controller
{
    public function __construct(CandidateServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/candidates",
     *      operationId="getCandidatesList",
     *      tags={"Candidates"},
     *      summary="Get list of candidates",
     *      description="Returns list of candidates",
     *      @OA\Parameter(ref="#/components/parameters/page"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CandidateResourceCollection")
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
    public function index(PaginateCandidateRequest $request)
    {
        $data = $request->validated();
        return (CandidateResource::collection($this->service->list($data)))
        ->additional([
            'meta' => [
                'columns' => Candidate::VISIBLE,
                'model' => 'candidate'
                ]
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/candidates",
     *      operationId="storeCandidate",
     *      tags={"Candidates"},
     *      summary="Store new candidate",
     *      description="Returns candidate data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateCandidateRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CandidateResource")
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
    public function store(CreateCandidateRequest $request)
    {
        $data = $request->validated();
        return response(new CandidateResource($this->service->createCandidate($data)), Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/candidates/{id}",
     *      operationId="getCandidateById",
     *      tags={"Candidates"},
     *      summary="Get candidate information",
     *      description="Returns candidate data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Candidate id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CandidateResource")
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
    public function show(Candidate $candidate)
    {
        return response(new CandidateResource($candidate), Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *      path="/api/candidates/{id}",
     *      operationId="updateCandidate",
     *      tags={"Candidates"},
     *      summary="Update existing candidate",
     *      description="Returns updated candidate data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Candidate id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCandidateRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CandidateResource")
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
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $data = $request->validated();
        return response(new CandidateResource($this->service->updateCandidate($candidate, $data)), Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/api/candidates/{id}",
     *      operationId="deleteCandidate",
     *      tags={"Candidates"},
     *      summary="Delete existing candidate",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Candidate id",
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
    public function destroy(Candidate $candidate)
    {
        Candidate::destroy($candidate->id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
