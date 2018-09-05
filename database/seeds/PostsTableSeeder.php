<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\Models\Post::class,20)->create()->each(function ($u) {
	        $u->addMediaFromUrl('http://lorempixel.com/800/600/')->toMediaCollection('posts');;
	    });
    }
}
