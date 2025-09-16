<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    protected $fillable = ['name', 'slug', 'message'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guest) {
            $guest->slug = Str::slug($guest->name);
        });
    }
}
