<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'room',
        'bed',
        'bathroom',
        'sqm',
        'adress',
        'coordinate_long_lat',
        'img_path',
        'img_name',
        'is_visible'
    ];
}
