<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'message', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guest) {
            $guest->slug = Str::slug($guest->name . '-' . uniqid());
        });
    }
}
