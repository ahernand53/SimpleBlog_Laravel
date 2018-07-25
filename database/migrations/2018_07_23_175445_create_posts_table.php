<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); //Foringkey
            $table->integer('category_id')->unsigned();

            $table->string ('name',128);
            $table->string('slug',128);

            $table->mediumText('excerpt')->nullable();
            $table->text('body');
            $table->enum('status',['PUBLISHED','DRAFT'])->default('DRAFT');//Tipo de dato que guarda dos estados y por defecto siempre utiliza borrador

            $table->string('file',256)->nullable();

            $table->timestamps();

            //Relaciones
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')   //Sí eliminamos un usuario eliminamos todos sus post
                ->onUpdate('cascade'); // Si actualizamos un usuario actualizamos todos sus post
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')  
                ->onUpdate('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
