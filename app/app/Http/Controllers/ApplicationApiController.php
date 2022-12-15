<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateApplicationRequest;
use App\Http\Requests\Paginate\PaginateApplicationRequest;
use App\Http\Requests\Update\UpdateApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Services\ApplicationServiceInterface;
use Illuminate\Http\Response;

/**
 * @OA\Parameter (
 *      parameter="page",
 *      in="query",
 *      name="page",
 *      required=true,
 *      description="A pagina alvo",
 *      @OA\Schema(
 *          type="integer",
 *          example="1"
 *      ),
 * ),
 * 
 * @OA\Schema(
 *      schema="welcome_message",
 *      @OA\Property(property="message", type="string", example="Back-end Challenge 2021 - Space Flight News"),
 * ),
 */

class ApplicationApiController extends Controller
{
    public function __construct(ApplicationServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/applications",
     *      operationId="getApplicationsList",
     *      tags={"Applications"},
     *      summary="Get list of applications",
     *      description="Returns list of applications",
     *      @OA\Parameter(ref="#/components/parameters/page"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ApplicationResourceCollection")
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
    public function index(PaginateApplicationRequest $request)
    {
        $data = $request->validated();
        return (ApplicationResource::collection($this->service->list($data)))
        ->additional([
            'meta' => [
                'columns' => ['id','candidate', 'opportunity'],
                'model' => 'Application'
                ]
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/applications",
     *      operationId="storeApplication",
     *      tags={"Applications"},
     *      summary="Store new Application",
     *      description="Returns Application data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateApplicationRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ApplicationResource")
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
    public function store(CreateApplicationRequest $request)
    {
        $data = $request->validated();
        return response(new ApplicationResource($this->service->createApplication($data)), Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/applications/{id}",
     *      operationId="getApplicationById",
     *      tags={"Applications"},
     *      summary="Get Application information",
     *      description="Returns Application data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Application id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ApplicationResource")
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
    public function show(Application $Application)
    {
        return response(new ApplicationResource($Application), Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *      path="/api/applications/{id}",
     *      operationId="updateApplication",
     *      tags={"Applications"},
     *      summary="Update existing Application",
     *      description="Returns updated Application data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Application id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateApplicationRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ApplicationResource")
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
    public function update(UpdateApplicationRequest $request, Application $Application)
    {
        $data = $request->validated();
        return response(new ApplicationResource($this->service->updateApplication($Application, $data)), Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/api/applications/{id}",
     *      operationId="deleteApplication",
     *      tags={"Applications"},
     *      summary="Delete existing Application",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Application id",
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
    public function destroy(Application $Application)
    {
        Application::destroy($Application->id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
