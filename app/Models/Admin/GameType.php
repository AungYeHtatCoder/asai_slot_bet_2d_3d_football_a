<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    use HasFactory;

    protected $fillable =['name','description'];
    protected $appends = ['img_url'];


    public function providers()
    {
        return $this->belongsToMany(Provider::class,'game_type_provider')->withPivot('image');
    }

    // public function getIconUrlAttribute()
    // {
    //     return asset('/slot_app/images/icon/' . $this->icon);
    // }

    public function getImgUrlAttribute()
    {
        return asset('assets/slot_app/images/icon/' . $this->icon);
    }
   
}
