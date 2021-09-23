<?php

namespace App\Http\Requests\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required'     => 'É necessário enviar um nome',
            'email.required'    => 'É necessário enviar um email',
            'email.unique'      => 'Email já em uso',
            'password.required' => 'É necessário enviar uma senha'
        ];
    }
}
