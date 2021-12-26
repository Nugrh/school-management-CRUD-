<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        $admin = User::create([
            'name' => 'admin',
            'birth' => '2021-12-23',
            'email' => 'admin@role.test',
            'password' => 'admin',
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        $student = User::create([
            'name' => 'student',
            'student_id' => rand(1000000000,9999999999),
            'birth' => '2021-12-23',
            'email' => 'student@role.test',
            'class' => '11',
            'password' => 'student',
            'role' => 'student',
        ]);
        $student->assignRole('student');

        for ($i = 0; $i < 10; $i++){
            $student = User::create([
                'name' => $this->faker->name(),
                'student_id' => rand(1000000000,9999999999),
                'birth' => $this->faker->date(),
                'email' => $this->faker->unique()->safeEmail(),
                'class' => $this->faker->randomElement(['10', '11', '12']),
                'password' => Hash::make('student'),
                'role' => 'student',
                'remember_token' => Str::random(10),
            ]);
            $student->assignRole('student');
        }

        $teacher = User::create([
            'name' => 'teacher',
            'teacher_id' => rand(1000000000,9999999999),
            'birth' => '2021-12-23',
            'email' => 'teacher@role.test',
            'password' => 'teacher',
            'role' => 'teacher',
        ]);
        $teacher->assignRole('teacher');

        for ($i = 0; $i < 10; $i++){
            $teacher = User::create([
                'name' => $this->faker->name(),
                'teacher_id' => rand(1000000000,9999999999),
                'birth' => $this->faker->date(),
                'email' => $this->faker->unique()->safeEmail(),
                'password' => Hash::make('student'),
                'role' => 'teacher',
                'remember_token' => Str::random(10),
            ]);
            $teacher->assignRole('teacher');
        }

    }
}
