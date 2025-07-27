<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'created_by',
        'updated_by',
        'avatar',
        'name',
        'slug',
        'description',
        'is_active'
    ];
}
