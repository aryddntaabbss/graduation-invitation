<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $table = 'page_settings';

    protected $fillable = [
        'background',
        'header_text',
        'hero_image',
        'name',
        'degree',
        'class_info',
        'day',
        'date',
        'month',
        'time',
        'address',
        'maps_url',
        'music_file',
    ];
}
