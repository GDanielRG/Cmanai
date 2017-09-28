<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rack_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned();

            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
            
            $table->foreign('rack_id')
            ->references('id')
            ->on('racks')
            ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('items');
    }
}
