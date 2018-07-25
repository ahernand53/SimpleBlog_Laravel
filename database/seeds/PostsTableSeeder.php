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
        factory(App\Post::class,300)->create()->each(function(App\Post $post){
            $post->tags()->attach([ //Post se relaciona con tags y luego con attach decimos que se relacionan y pasamos un array
                //Metodo tags que existe en el modelo
                rand(1,5),
                rand(6,14),
                rand(15,20),

            ]);
        });
    }
}
