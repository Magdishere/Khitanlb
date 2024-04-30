<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_option_order_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_option_id');
            $table->unsignedBigInteger('order_item_id');
            $table->timestamps();

            $table->foreign('attribute_option_id')->references('id')->on('attribute_options')->onDelete('cascade');
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attribute_option_order_item');
    }
};
