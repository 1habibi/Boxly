<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string' ,
            'surname' => 'required|string' ,
            'patronymic' => 'string',
            'phone_number' => 'required|string' ,
            'city' => 'required|string',
            'street' => 'required|string',
            'house' => 'required|string',
            'apartment' => 'required|string',
            'post_index' => 'required|string',
        ];
    }
}
