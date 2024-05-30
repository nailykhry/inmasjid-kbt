<?php

namespace App\Models;

use App\Models\ItemImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LostFound extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category',
        'item_name',
        'description',
        'location',
        'latitude',
        'longitude',
        'pic_name',
        'pic_phone'
    ];

    public function itemImages()
    {
        return $this->hasMany(ItemImage::class);
    }
}
