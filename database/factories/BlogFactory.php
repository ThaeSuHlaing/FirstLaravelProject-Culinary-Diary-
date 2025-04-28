<?php

namespace Database\Factories;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'category_id'=>Category::factory(),
            'title'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'intro'=>$this->faker->sentence(),
            'body'=>$this->faker->paragraph(),
            'user_id'=>User::factory()
        ];
    }
}
