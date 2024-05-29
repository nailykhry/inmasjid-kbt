<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'pic_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function types()
    {
        return $this->belongsTo(Type::class);
    }

    public function need()
    {
        return $this->hasMany(Request::class, 'inventory_id', 'id');
    }

    public function images(){
        return $this->hasMany(InventoryImages::class);
    }

}
