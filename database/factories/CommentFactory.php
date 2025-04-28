<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'body'=>$this->faker->paragraph(),
            'user_id'=>User::factory(),
            'blog_id'=>Blog::factory()
        ];
    }
}
