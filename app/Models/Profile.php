<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subtitle', // Add this
        'email',
        'bio',
        'photo_path',
        'social_links', // Add this
        'resume_path', // Add this

    ];

    protected $casts = [
        'social_links' => 'array', // Add this
    ];
}
