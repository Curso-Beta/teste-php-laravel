<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="OpportunityResource",
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="name", type="string", example="Sample Name"),
 * ),
 * 
 * @OA\Schema(schema="OpportunityResourceCollection", type="array", @OA\Items(ref="#components/schemas/ApplicationResource")),
 * 
 * ),
 */
class OpportunityResource extends JsonResource
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
