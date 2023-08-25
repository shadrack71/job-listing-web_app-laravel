<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostGigModel extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'description'

        
    ];
}