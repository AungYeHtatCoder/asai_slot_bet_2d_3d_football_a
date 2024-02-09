<?php

namespace App\Models\Admin;

use App\Models\Admin\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameList extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_id',
        'name_en',
        'name_mm',
        'image',
        'game_type_id',
        'provider_id',
        'click_count'
    ];
    protected $appends = ['img_url'];


    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }
    public function getImgUrlAttribute()
    {
        return asset('/game_logo/' . $this->image);
    }

}
