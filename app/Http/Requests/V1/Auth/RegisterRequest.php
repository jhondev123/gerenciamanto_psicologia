<?php

namespace App\Http\Requests\V1\Auth;

use App\Rules\V1\Auth\PasswordRule;
use App\Rules\V1\Cpf\CpfRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'cpf' => ['required', 'string',new CpfRule(), 'unique:people'],
            'password' => ['required', new PasswordRule() , 'confirmed'],
        ];
    }
}
