<?php

namespace App\Http\Requests\Paginate;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      @OA\Property(property="contract_type", type="string", example="CLT"),
 *      @OA\Property(property="accepts_applications", type="bool", example="false"),
 *      @OA\Property(property="offered_salary", type="integer", example="18237"),
 *      @OA\Property(property="limit", type="limit", example="10"),
 *      @OA\Property(property="orderBy", type="string", example="candidate"),
 *      @OA\Property(property="sortedBy", type="integer", example="asc"),
 * ),
 */
class PaginateOpportunityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contract_type' => 'string',
            'accepts_applications' => 'string',
            'offered_salary' => 'string',
            'limit' => 'integer',
            'orderBy' => 'string',
            'sortedBy' => 'string|in:asc,desc',
        ];
    }
}
