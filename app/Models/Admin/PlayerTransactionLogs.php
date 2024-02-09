<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerTransactionLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'refrence_id',
        'user_id',
        'p_code',
        'cash_in',
        'cash_out',
        'status',
        'progress_main_bal',
        'status',
        'sync',
        'sync_time',
        'remark',
        'trans_id',
        'trans_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

}
