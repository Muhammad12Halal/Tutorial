<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Open extends Model
{
    use HasFactory;

    protected $table = "opens";

    protected $fillable = [
        'title',
        'place',
        'content',
    ];
}
