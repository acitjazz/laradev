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
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('type')->nullable();
            $table->string('template')->nullable();
            $table->string('video_id')->nullable();
            $table->string('video_source')->nullable();
            $table->string('photo_source')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('view')->default(0);
            $table->boolean('trash')->default(0);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('post_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('post_id')->unsigned();
                $table->string('locale')->index();
                $table->string('title')->nullable();
                $table->string('subtitle')->nullable();
                $table->string('slug')->nullable();
                $table->mediumText('summary')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->unique(['post_id', 'locale']);
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
