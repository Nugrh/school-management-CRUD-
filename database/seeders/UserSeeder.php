<?php

namespace Database\Seeders;

use App\Models\Lesson;
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
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        $teacher = User::create([
            'name' => 'teacher',
            'teacher_id' => rand(1000000000,9999999999),
            'birth' => $this->faker->date(),
            'email' => 'teacher@role.test',
            'address' => $this->faker->city(),
            'password' => Hash::make('teacher'),
            'role' => 'teacher',
        ]);
        $teacher->assignRole('teacher');

        for ($i = 1; $i <= 9; $i++){
            $teacher = User::create([
                'name' => $this->faker->name(),
                'teacher_id' => rand(1000000000,9999999999),
                'birth' => $this->faker->date(),
                'address' => $this->faker->city(),
                'email' => $this->faker->unique()->safeEmail(),
                'password' => Hash::make('teacher'),
                'role' => 'teacher',
                'lesson' => 'Lesson ' . $i,
                'remember_token' => Str::random(10),
            ]);
            $teacher->assignRole('teacher');
        }

        $student = User::create([
            'name' => 'student',
            'student_id' => rand(1000000000,9999999999),
            'birth' => $this->faker->date(),
            'address' => $this->faker->city(),
            'email' => 'student@role.test',
            'class' => '11',
            'password' => Hash::make('student'),
            'role' => 'student',
        ]);
        $student->assignRole('student');

        for ($i = 1; $i <= 30; $i++){
            $student = User::create([
                'name' => $this->faker->name(),
                'student_id' => rand(1000000000,9999999999),
                'birth' => $this->faker->date(),
                'email' => $this->faker->unique()->safeEmail(),
                'address' => $this->faker->city(),
                'class' => '10',
                'attendance' => $this->faker->randomElement(['attend', 'absent']),
                'password' => Hash::make('student'),
                'role' => 'student',
                'remember_token' => Str::random(10),
            ]);
            $student->assignRole('student');

            $student = User::create([
                'name' => $this->faker->name(),
                'student_id' => rand(1000000000,9999999999),
                'birth' => $this->faker->date(),
                'email' => $this->faker->unique()->safeEmail(),
                'address' => $this->faker->city(),
                'class' => '11',
                'password' => Hash::make('student'),
                'role' => 'student',
                'remember_token' => Str::random(10),
            ]);
            $student->assignRole('student');

            $student = User::create([
                'name' => $this->faker->name(),
                'student_id' => rand(1000000000,9999999999),
                'birth' => $this->faker->date(),
                'email' => $this->faker->unique()->safeEmail(),
                'address' => $this->faker->city(),
                'class' => '12',
                'password' => Hash::make('student'),
                'role' => 'student',
                'remember_token' => Str::random(10),
            ]);
            $student->assignRole('student');
        }

        for ($i = 1; $i <= 2; $i++) {
            Lesson::create([
                'lesson' => "Lesson $i",
                'time' => $this->faker->randomElement(['9:00', '11:00'])
            ]);
        }

        for ($i = 2; $i <= 4; $i++) {
            Lesson::create([
                'lesson' => "Lesson $i",
                'time' => $this->faker->randomElement(['9:00:00', '11:00:00'])
            ]);
        }

        for ($i = 4; $i <= 6; $i++) {
            Lesson::create([
                'lesson' => "Lesson $i",
                'time' => $this->faker->randomElement(['9:00:00', '11:00:00'])
            ]);
        }

        for ($i = 6; $i <= 8; $i++) {
            Lesson::create([
                'lesson' => "Lesson $i",
                'time' => $this->faker->randomElement(['9:00:00', '11:00:00'])
            ]);
        }

        Lesson::create([
            'lesson' => "Lesson 9",
            'time' => '9:00:00'
        ]);
    }
}
