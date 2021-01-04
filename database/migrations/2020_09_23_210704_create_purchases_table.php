<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable(false);
            $table->unsignedBigInteger('purchase_item_id')->nullable(false);

            $table->foreign('supplier_id','supplier')->references('id')->cascadeOnDelete()->on('suppliers');
            $table->dateTime('date')->nullable(false);
            $table->longText('notes');
            $table->boolean('payment_status');
            $table->unsignedFloat('discount')->default(0);
            $table->enum('payment_mode',['Mobile Money','Cash','Cheque','E-Switch','Bank'])->default('Cash');
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
        Schema::dropIfExists('purchases');
    }
}
