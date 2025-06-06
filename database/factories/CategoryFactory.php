<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model=Category::class;

    public function definition(): array
    {
        return [
            'name'=>$this->faker->unique()->word(),
            'slug'=>$this->faker->unique()->slug()
        ];
    }
}
