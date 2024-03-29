<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories=Category::factory(5)->create();
        User::factory(5)->create()->each(function($user) use ($categories){
            Post::factory(rand(1,4))->create([
                'user_id'=>$user->id,
                'category_id'=>($categories->random(1)->first())->id
            ]);
        });

    }
}
