<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('news_id');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('description',1000)->nullable();
            $table->timestamps();
            $table->foreign('news_id')->references('id')->on('news')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_gallery');
    }
}
