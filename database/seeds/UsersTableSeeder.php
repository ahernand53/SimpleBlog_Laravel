<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,29)->create(); //ejecutar factory
    
        //creando un usuario predefino 
        App\User::create([
            'name' => 'Edwin Sac',
            'email' => 'edwinsacrecinos@gmail.com',
            'password'=> bcrypt('123')

        ]);

    }
}
