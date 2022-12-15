<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="CompanyResource",
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="name", type="string", example="Sample Name"),
 * ),
 * 
 * @OA\Schema(schema="CompanyResourceCollection", type="array", @OA\Items(ref="#components/schemas/ApplicationResource")),
 * 
 * ),
 */
class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
