<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('family');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile1')->unique();
            $table->string('mobile2')->nullable();
            $table->string('job');
            $table->string('state');
            $table->string('city');
            $table->string('address',1000);
            $table->string('Knowledge')->default('متوسط');
            $table->string('introduction');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representations');
    }
}
