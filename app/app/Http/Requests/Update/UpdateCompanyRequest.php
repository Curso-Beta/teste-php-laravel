<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      @OA\Property(property="name", type="string", example="Sample Name"),
 * ),
 */
class UpdateCompanyRequest extends FormRequest
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
            'name' => 'required|string',
        ];
    }
}
