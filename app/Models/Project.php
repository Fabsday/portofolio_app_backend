<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'category', 'technology', 'stack', 'year', 'description',
    ];
}