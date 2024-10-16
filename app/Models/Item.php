<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
