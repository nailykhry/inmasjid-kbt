<?php

namespace App\Models;

use App\Models\LostFound;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'lost_found_id', 'image_path',
    ];

    public function lostFounds()
    {
        return $this->belongsTo(LostFound::class);
    }
}
