<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Followee;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Report::factory(30)->create();
        Article::factory(20)->create();
        Post::factory(50)->create();
        Followee::factory(60)->create();
        Bookmark::factory(50)->create();
        Comment::factory(50)->create();
        Like::factory(50)->create();
        User::create([
            "name"=>"Admin",
            "avatar"=>"Admin",
            "username"=>"Admin",
            "email"=>"kamaluddin.arsyad17@gmail.com",
            "password"=>Hash::make('admin'),
            "role"=>"admin"
        ]);
    }
}
