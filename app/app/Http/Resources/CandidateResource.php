<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="CandidateResource",
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="name", type="string", example="name"),
 *      @OA\Property(property="email", type="string", example="email@teste.com"),
 *      @OA\Property(property="phone", type="string", example="phone"),
 *      @OA\Property(property="level", type="string", example="level"),
 *      @OA\Property(property="area", type="string", example="area"),
 *      @OA\Property(property="expected_salary", type="integer", example="10299"),
 * ),
 * 
 * @OA\Schema(schema="CandidateResourceCollection", type="array", @OA\Items(ref="#components/schemas/ApplicationResource")),
 * 
 * ),
 */
class CandidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

}
