<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => rand(1, 9999999999),
            'name' => $this->faker->name(),
            'birth' => $this->faker->date(),
            'email' => $this->faker->email(),
            'address' => $this->faker->city(),
        ];
    }
}
