<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $table = 'permissions';

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);

    }
}