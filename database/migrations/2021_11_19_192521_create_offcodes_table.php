<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->bigInteger('amount')->nullable();
            $table->tinyInteger('percentage')->nullable();
            $table->integer('quantity')->nullable();
            $table->smallInteger('time')->nullable();
            $table->string('off_reason');
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
        Schema::dropIfExists('offcodes');
    }
}
