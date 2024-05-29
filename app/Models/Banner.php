<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'name',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
