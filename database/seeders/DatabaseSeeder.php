<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categories;
use Database\Factories\PostFactory;
use Illuminate\Cache\Console\CacheTableCommand;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(5)->each(function ($user){
           $post = \App\Models\Post::factory()->make();
           $user->post()->save($post);
        });

        \App\Models\Post::factory()->create(5)->each(function ($post){
            $category = \App\Models\Categories::factory()->make();
            $post->post()->save($category);
        });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
