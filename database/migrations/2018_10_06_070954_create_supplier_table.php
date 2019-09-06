<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->string('supplier_name')->nullable();
            $table->string('supplier_mobile')->nullable();
            $table->string('supplier_email')->nullable();
            $table->text('supplier_address')->nullable();
            $table->float('sopaning_balance', 8,2)->nullable();
            $table->date('supplier_date')->nullable();
            $table->integer('supplier_userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
