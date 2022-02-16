<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = 'pet';
    protected $fillable = [
        'name',
        'race',
        'location',
        'description',
        'img_url',
        'age',
        'owner',
    ];

}
