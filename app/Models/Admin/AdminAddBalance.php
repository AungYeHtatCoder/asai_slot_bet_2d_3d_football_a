<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAddBalance extends Model
{
    use HasFactory;
    protected $fillable = [
        'balance_up', 'user_id', 'remark'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
