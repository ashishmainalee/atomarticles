<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
        'site_image',
        'site_banner',
        'address',
        'contact_number',
        'email',
        'facebook',
        'site_description',
        'site_policy',
        'site_terms',
    ];
}
