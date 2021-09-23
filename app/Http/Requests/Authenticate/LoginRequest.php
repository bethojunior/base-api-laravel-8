<?php

namespace App\Http\Requests\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'email.required' => 'É necessário enviar um email',
            'password.required' => 'É necessário enviar uma senha'
        ];
    }
}
