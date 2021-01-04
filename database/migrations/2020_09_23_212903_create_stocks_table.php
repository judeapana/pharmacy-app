<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable(false);
            $table->unsignedBigInteger('unit_id')->nullable(false);

            $table->foreign('product_id', 'product_id_fk')->on('products')->cascadeOnDelete()->references('id');
            $table->unsignedFloat('quantity')->default(1);
            $table->foreign('unit_id', 'unit_id_fk')->references('id')->on('units')->cascadeOnDelete();
            $table->date('stock_date')->nullable(false);
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
        Schema::dropIfExists('stocks');
    }
}
