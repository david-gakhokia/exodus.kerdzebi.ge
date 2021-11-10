<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'status',
        'place_id',
    ];

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
