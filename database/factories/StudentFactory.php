<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => rand(1, 9999999999),
            'name' => $this->faker->name(),
            'birth' => $this->faker->date(),
            'class' => rand(10,12),
            'address' => $this->faker->city(),
        ];
    }
}
