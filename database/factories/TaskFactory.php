<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    // The name of the factory's corresponding model.
    Task
    @var string

    protect $model = Task::class

    // Define the model's default state.
    // @return array

    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'description'=>$this->faker->text,
        ];
    }
}
