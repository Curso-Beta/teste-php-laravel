<?php

namespace App\Http\Requests\Paginate;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      @OA\Property(property="name", type="string", example="name"),
 *      @OA\Property(property="mail", type="string", example="email"),
 *      @OA\Property(property="phone", type="string", example="phone"),
 *      @OA\Property(property="level", type="string", example="level"),
 *      @OA\Property(property="area", type="string", example="area"),
 *      @OA\Property(property="expected_salary", type="string", example="expected_salary"),
 *      @OA\Property(property="limit", type="limit", example="10"),
 *      @OA\Property(property="orderBy", type="string", example="candidate"),
 *      @OA\Property(property="sortedBy", type="integer", example="asc"),
 * ),
 */
class PaginateCandidateRequest extends FormRequest
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
            'name' => 'string',
            'mail' => 'string',
            'phone' => 'string',
            'area' => 'string',
            'level' => 'string|in:medio,tecnico,superior',
            'expected_salary' => 'string|numeric',
            'limit' => 'integer',
            'orderBy' => 'string',
            'sortedBy' => 'string|in:asc,desc',
        ];
    }
}
