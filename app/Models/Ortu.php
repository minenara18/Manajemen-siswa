<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent', 'parents_job'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
