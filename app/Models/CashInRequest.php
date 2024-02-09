<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashInRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_method', 'amount', 'phone', 'user_id', 'last_6_num', 'status', 'receipt'
    ];
    protected $appends = ['img_url'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImgUrlAttribute()
    {
        return asset('assets/img/receipts/' . $this->receipt);
    }
}
