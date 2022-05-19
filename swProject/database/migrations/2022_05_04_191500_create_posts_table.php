<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            
            $table->id();
            
            // // unsigned bigInts for the FKs
            // $table->bigInteger('user_id')->unsigned();

            // // foreign keys
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->string('post_text');
            $table->date('release_date');

            $table->timestamps();
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
