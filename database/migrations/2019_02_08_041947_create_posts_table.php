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
            $table->string('title',100);
            $table->string('keyword',250)->nullable();
            $table->string('description',250)->nullable();
            $table->string('heading',250);
            $table->longText('shortstory')->nullable();
            $table->longText('fullstory');
            $table->string('fimage',200)->nullable();
            $table->tinyInteger('categories_id');
            $table->tinyInteger('users_id');
            $table->tinyInteger('status');
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
