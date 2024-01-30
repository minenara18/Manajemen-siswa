<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'payment_id', 'date_of_pay', 'month'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function spp()
    {
        return $this->hasMany(Payment::class);
    }
}
