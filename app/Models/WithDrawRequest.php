<?php

namespace App\Models;

use App\Models\Admin\Bank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDrawRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'bank_id', 'amount','status','account_no','account_name'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
