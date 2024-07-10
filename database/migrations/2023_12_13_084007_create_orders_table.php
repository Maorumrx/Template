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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_type')->nullable();
            $table->bigInteger('bu_tb_code')->nullable();
            $table->date('due_date')->nullable();
            $table->bigInteger('investment')->nullable();
            $table->bigInteger('receive_qty')->nullable();
            $table->bigInteger('remain')->nullable();
            $table->bigInteger('qty')->default(0);
            $table->bigInteger('total_sales')->default(0);
            $table->bigInteger('created_by')->nullable();
            $table->string('state')->nullable();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('orders');
    }
};
