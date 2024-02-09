<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image', 'link'
    ];

    protected $appends = ['img_url'];

    public function getImgUrlAttribute()
    {
        return asset('assets/img/games/' . $this->image);
    }
}
