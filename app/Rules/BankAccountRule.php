<?php

namespace App\Rules;

use App\Models\Admin\Bank;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BankAccountRule implements Rule
{
    protected $bankId;

    public function __construct($bankId)
    {
        $this->bankId = $bankId;
    }

    public function passes($attribute, $value)
    {
        $bank = Bank::find($this->bankId);
        
        if ($this->bankId !== null &&  $bank !== null ) {
            return strlen($value) === $bank->digit;
       
          
           }
             
        return true;
    }

    public function message()
    {
        return 'The account number must have ' . Bank::find($this->bankId)->digit . ' digits.';
    }
}
