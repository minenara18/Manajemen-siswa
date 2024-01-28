<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'name' => 'Daniel Smith',
            'nip' => '4326711865',
            'place_of_birth' => 'disini',
            'date_of_birth' => '1999-11-19',
            'address' => 'London, D-34',
            'photo' => 'belum ada jpg',
            'position' => 'Teacher',
            'gender' => 'Male',
            'religion' => 'Christian',
        ]);
    }
}
