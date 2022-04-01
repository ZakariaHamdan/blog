<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        User::factory(3)->create();
        Category::create([
            'name' => 'Work',
            'slug' => 'work'
            ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
            ]);
        Category::create([
            'name' => 'Family',
            'slug' => 'family'
            ]);
        Category::create([
            'name' => '4th',
            'slug' => '4thslug'
            ]);
        Comment::factory(20)->create();
    }
}
