<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'from_user_id',
        'to_user_id',
        'refrence_id',
        'cash_in',
        'cash_out',
        'cash_balance',
        'p_code',
        'note',
        'sync',
        'sync_time',
        'type'
    ];
    protected $dates = ['created_at', 'updated_at'];
    

    /**
     * Get the user who initiated the transfer.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    /**
     * Get the user who received the transfer.
     *
     * @return BelongsTo
     */
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}