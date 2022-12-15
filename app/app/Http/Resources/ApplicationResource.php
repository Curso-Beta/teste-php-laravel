<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="ApplicationResource",
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="candidate", type="string", example="Sample Name"),
 *      @OA\Property(property="opportunity", type="string", example="Sample Description"),
 * ),
 * 
 * @OA\Schema(schema="ApplicationResourceCollection", type="array", @OA\Items(ref="#components/schemas/ApplicationResource")),
 * 
 * ),
 */
class ApplicationResource extends JsonResource
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
            'candidate' => $this->candidate->name,
            'opportunity' => $this->opportunity->contract_type . " - " . $this->opportunity->offered_salary,
        ];
    }
}
