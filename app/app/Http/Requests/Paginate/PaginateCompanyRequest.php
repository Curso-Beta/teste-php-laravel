<?php

namespace App\Http\Requests\Paginate;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      @OA\Property(property="name", type="limit", example="name"),
 *      @OA\Property(property="limit", type="limit", example="10"),
 *      @OA\Property(property="orderBy", type="string", example="candidate"),
 *      @OA\Property(property="sortedBy", type="integer", example="asc"),
 * ),
 */
class PaginateCompanyRequest extends FormRequest
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
            'limit' => 'integer',
            'orderBy' => 'string',
            'sortedBy' => 'string|in:asc,desc',
        ];
    }
}
