<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = array();

    protected $fillable = [
        'status',
        'name_ka',
        'name_en',
        'name_ru',
        'image',
        'category_id',
        'price',
        'description_ka',
        'description_en',
        'description_ru',
        'numeric',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
