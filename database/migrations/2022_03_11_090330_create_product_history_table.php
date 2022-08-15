<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->string('title');
            $table->string('abstract')->nullable();
            $table->smallInteger('type');
            $table->bigInteger('price');
            $table->bigInteger('offprice')->nullable();
            $table->string('inventory');
            $table->boolean('amazing')->default(false);
            $table->smallInteger('amazing_time')->nullable();
            $table->bigInteger('amazing_price')->nullable();
            $table->boolean('special')->default(false);
            $table->string('description',10000)->nullable();
            $table->string('off_reason')->nullable();
            $table->bigInteger('final_price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::dropIfExists('product_history');
    }
}
