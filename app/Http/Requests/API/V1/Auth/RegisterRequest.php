<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        if (! is_null($this->input('mobile'))) {
            $this->merge([
                'mobile' => to_valid_mobile_number($this->input('mobile')),
            ]);
        }
    }

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }
}
