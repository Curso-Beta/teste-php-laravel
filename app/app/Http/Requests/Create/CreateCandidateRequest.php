<?php

namespace App\Http\Requests\Create;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      @OA\Property(property="name", type="string", example="name"),
 *      @OA\Property(property="email", type="string", example="email@teste.com"),
 *      @OA\Property(property="phone", type="string", example="phone"),
 *      @OA\Property(property="level", type="string", example="level"),
 *      @OA\Property(property="area", type="string", example="area"),
 *      @OA\Property(property="expected_salary", type="string", example="3200"),
 * ),
 */
class CreateCandidateRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required',
            'level' => 'required|in:medio,tecnico,superior',
            'area' => 'required|string|max:50',
            'expected_salary' => 'required|integer',
        ];
    }
}
