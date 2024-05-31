<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('add user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'civilite' => 'required',
            'nom' => 'required|max:255',
            'prenom'=> 'required|max:255',
            'matricule'=> 'required',
            'email' => 'required|email|max:255',
            'telephone'=> 'required',
            'service_id'=> 'required|integer',
            'role'=> 'required',
        ];
    }
}
