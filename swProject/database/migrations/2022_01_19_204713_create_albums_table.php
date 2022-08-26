<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //  NOTE: despite still being called albums, this table is for posts.
    public function up()
    {
        Schema::create('albums', function (Blueprint $table){
            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->string('post_text');
            $table->string('location');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    // public function up()
    // {
    //     Schema::create('albums', function (Blueprint $table) {
    //         $table->id();
            
    //         $table->string('title');
    //         $table->string('description');
    //         $table->string('artists');
    //         $table->string('tracks');
    //         $table->date('release_date');

    //         $table->decimal('price');
    //         $table->string('contact_name');
    //         $table->string('contact_email');
    //         $table->string('contact_phone');

    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
