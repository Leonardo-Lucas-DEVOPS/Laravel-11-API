<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $Userid = $this->route('Userid');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($Userid ? $Userid->id : null),
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo Nome é Obrigatório',
            'email.required' => 'Campo Email é Obrigatório',
            'email.email' => 'Necessário enviar Email válido',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Campo Password é Obrigatório',
            'password.min' => 'Campo Password deve possuir pelo menos 6 caracteres',
        ];
    }

    /**
     * Manipular as falhas da validação e retornar uma resposta JSON com os erros de validação 
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
