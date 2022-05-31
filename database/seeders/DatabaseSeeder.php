<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            PostSeeder::class,
        ]);
        // $post = Post::create([
        //     'title' => 'Title 1',
        //     'body' => 'Body 1',
        //     'author_name' => 'mo'
        // ]);

        // $post->save();
    }
}
