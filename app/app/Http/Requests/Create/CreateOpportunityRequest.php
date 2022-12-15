<?php

namespace App\Http\Requests\Create;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      @OA\Property(property="contract_type", type="string", example="CLT"),
 *      @OA\Property(property="accepts_applications", type="bool", example="false"),
 *      @OA\Property(property="offered_salary", type="integer", example="18237"),
 * ),
 */
class CreateOpportunityRequest extends FormRequest
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
            'contract_type' => 'required|in:clt,pj,freelancer',
            'accepts_applications' => 'boolean',
            'offered_salary' => 'required|integer',
        ];
    }
}
