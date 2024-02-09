<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'currentPassword' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
    // public function withValidator($validator)
    // {
    // $validator->after(function ($validator) {
    //     if ( !Hash::check($this->current_password, $this->user()->password) ) {
    //         $validator->errors()->add('current_password', 'Your current password is incorrect.');
    //     }
    // });
    // return;
//  }


}
