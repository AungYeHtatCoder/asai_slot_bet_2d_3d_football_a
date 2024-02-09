<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentList extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_method', 'phone', 'receiver_name'
    ];
}
