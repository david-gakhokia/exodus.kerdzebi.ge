<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name'];

    public function tables()
    {
        return $this->hasMany('App\Models\Table');
    }
}
