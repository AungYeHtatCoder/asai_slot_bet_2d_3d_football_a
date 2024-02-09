<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['p_code','description'];
    // protected $appends = ['img_url'];


    // public function gameTypes()
    // {
    //     return $this->belongsToMany(GameType::class)->withPivot('image');
    // }

    // // public function getGameIconUrlAttribute()
    // // {
    // //     return asset('/slot_app/images/gametypeicon/' . $this->pivot->image);
    // // }
    // public function getImgUrlAttribute()
    // {
    //     return asset('assets/slot_app/images/gametypeicon/' . $this->pivot->image);
    // }

    protected $appends = ['img_url'];

    public function gameTypes()
    {
        return $this->belongsToMany(GameType::class)->withPivot('image');
    }

    // Accessor for img_url that checks if pivot data is available
    public function getImgUrlAttribute()
    {
        // If the pivot property is set and image is available, return the asset URL
        if (isset($this->pivot) && isset($this->pivot->image)) {
            return asset('assets/slot_app/images/gametypeicon/' . $this->pivot->image);
        }
        // Otherwise, return a default or null
        return null;
    }

}