<?php

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
            $table->engine = 'InnoDB';
            $table->increments('post_id');
            $table->string('title', 200);
            $table->text('post');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('posts', function (Blueprint $table) {
           $table->dropForeign('posts_username_foreign'); 
        });
        */
        Schema::dropIfExists('posts');
    }
}
