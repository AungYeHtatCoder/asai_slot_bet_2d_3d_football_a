<?php

namespace App\Models\Admin;

use App\Models\Admin\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    public $table = 'roles';
    protected $date = ['created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);

    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);

    }
}