<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MasterRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST': // Creating data
                return $this->createRules();
            case 'PUT':
            case 'PATCH': // Updating data
                return $this->updateRules();
            default:
                return [];
        }
    }
    protected function createRules(): array
    {

        return [
            'name' => 'required|min:3|unique:users,name',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone'],
            'password' => 'required|min:6|confirmed',
        ];
    }

    protected function updateRules(): array
    {
    
        return [
            'name' => ['required','min:3|unique:users,name',Rule::unique('users')],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone',Rule::unique('users')],
            'password' => 'nullable|min:6|confirmed',
        ];
    }
}
