<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id')->nullable(false);
            $table->unsignedBigInteger('shelf_id')->nullable(false);
            $table->unsignedBigInteger('generic_name_id')->nullable(false);
            $table->unsignedBigInteger('unit_id')->nullable(false);
            $table->foreign('cat_id', 'category')
                ->onDelete('cascade')
                ->references('id')
                ->on('categories');
            $table->foreign('shelf_id', 'shelf')
                ->on('shelves')
                ->references('id')
                ->cascadeOnDelete();
            $table->foreign('generic_name_id', 'generic_name')
                ->cascadeOnDelete()
                ->on('generic_names')->
                references('id');
            $table->string('specific_name')
                ->nullable(false);
            $table->string('batch_no');
            $table->unsignedFloat('selling_price')->nullable(false);
            $table->unsignedFloat('cost_price')->nullable(false);
            $table->foreign('unit_id', 'unit')
                ->references('id')
                ->cascadeOnDelete()->on('units');
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
        Schema::dropIfExists('products');
    }
}
