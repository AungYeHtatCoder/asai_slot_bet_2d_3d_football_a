<?php

namespace App\Models;

use App\Models\Admin\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user_wallets';

     protected $fillable = [
        'user_id',
        'wallet',
        'ag_wallet',
        'gb_wallet',
        'g8_wallet',
        'jk_wallet',
        'jd_wallet',
        'l4_wallet',
        'k9_wallet',
        'pg_wallet',
        'pr_wallet',
        're_wallet',
        's3_wallet',
        'status'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}