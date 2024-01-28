<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['major_name', 'description'];

    public function classroom() {
        return $this->hasMany(Classroom::class);
    }
}
