<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learns_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('learn_id');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('description',1000)->nullable();
            $table->timestamps();
            $table->foreign('learn_id')->references('id')->on('learns')
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
        Schema::dropIfExists('learns_gallery');
    }
}
