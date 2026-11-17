<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $course1 = Course::create([
            'name' => 'Introduction to Programming',
            'code' => '4CS001',
            'description' => 'Introduction to programming and problem solving.',
        ]);

        $course2 = Course::create([
            'name' => 'Fundamentals of Computing',
            'code' => '4CS015',
            'description' => 'Fundamentals of computing.',
        ]);

        $student = Student::create([
            'name' => 'Kushal Gurung',
            'email' => 'Kushal@gmail.com',
            'phone' => '99244325',
            'address' => 'Kathmandu',
            'date_of_birth' => '2000-01-01',
        ]);

        $student->courses()->attach([
            $course1->id,
            $course2->id,
        ]);
    }
}