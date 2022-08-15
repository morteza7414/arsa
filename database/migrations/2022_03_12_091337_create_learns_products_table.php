<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learns_products', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('learn_id');
            $table->timestamps();

            $table->primary(['product_id', 'learn_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('learn_id')
                ->references('id')
                ->on('learns')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learns_products');
    }
}
