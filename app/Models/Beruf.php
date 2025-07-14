<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beruf extends Model
{
    /** @use HasFactory<\Database\Factories\BerufFactory> */
    use HasFactory;
    protected $fillable = ['title', 'salary'];
}
