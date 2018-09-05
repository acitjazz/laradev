<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_id')->nullable();
                $table->string('locale')->nullable();
                $table->string('name')->nullable();
                $table->mediumText('description')->nullable();
                $table->boolean('trash')->default(0);
                $table->timestamps();
            });
        Schema::create('categoryables', function (Blueprint $table) {
                $table->integer('category_id')->unsigned()->index();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->integer('categoryable_id');
                $table->string('categoryable_type');
                $table->timestamps();
            });
        Schema::create('category_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->unique(['category_id', 'locale']);
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
