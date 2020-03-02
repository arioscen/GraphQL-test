<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('comments')->truncate();
        
        factory(App\Post::class, 50)->create()->each(function($u) {
            for ( $i=0 ; $i<rand(0, 10) ; $i++ ) {
                $u->comments()->save(factory(App\Comment::class)->make());
            }
        });
    }
}
