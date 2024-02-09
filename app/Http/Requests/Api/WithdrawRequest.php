<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawRequest extends FormRequest
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
            'bank_id' => ['required','exists:banks,id'],
            'amount' => ['required','integer','min:1000'],
            'account_name' => ['required','string','min:3','max:1024'],
            'account_no' =>['required','integer','min:1']
        ];
    }
}
