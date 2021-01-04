<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable(false);
            $table->foreign('customer_id','customer')->cascadeOnDelete()->on('customers')->references('id');
            $table->date('sales_date')->nullable(false);
            $table->enum('payment_mode',['Mobile Money','Cash','Cheque','E-Switch','Bank'])->default('Cash');
            $table->mediumText('notes');
            $table->unsignedFloat('discount')->default(0);
            $table->boolean('payment_status');
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
        Schema::dropIfExists('sales');
    }
}
