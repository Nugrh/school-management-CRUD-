<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@role.test',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        $admin->assignRole('admin');

        $student = Student::create([
            'name' => 'student',
            'student_id' => rand(0,9999999999),
            'birth' => '2021-12-23',
            'class' => '11',
            'address' => 'Jakarta',
            'password' => Hash::make('student'),
            'role' => 'student',
        ]);

//        $student->assignRole('student');

        $teacher = Teacher::create([
            'name' => 'teacher',
            'teacher_id' => rand(0,9999999999),
            'birth' => '2021-12-23',
            'email' => 'teacher@role.test',
            'address' => 'Jakarta',
            'password' => Hash::make('teacher'),
            'role' => 'teacher',
        ]);

//        $teacher->assignRole('teacher');
    }
}
