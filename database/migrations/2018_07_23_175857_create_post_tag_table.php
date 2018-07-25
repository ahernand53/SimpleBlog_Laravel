<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('post_id')->unsigned(); //Foringkey
            $table->integer('tag_id')->unsigned();

            $table->timestamps();

            //Relaciones
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('cascade')   //Sí eliminamos un usuario eliminamos todos sus post
                ->onUpdate('cascade'); // Si actualizamos un usuario actualizamos todos sus post
            $table->foreign('tag_id')->references('id')->on('tags')
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
        Schema::dropIfExists('post_tag');
    }
}
