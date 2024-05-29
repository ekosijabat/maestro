<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['email', 'token'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = \Carbon\Carbon::now();
    }
}
