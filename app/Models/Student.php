<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nisn', 'place_of_birth', 'date_of birth', 'address',
        'photo', 'gender', 'religion', 'ambision'
    ];
}
