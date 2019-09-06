<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_purchase', function (Blueprint $table) {
            $table->increments('local_purchase_id');
            $table->date('purchase_date')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('purchase_no')->nullable();
            $table->string('supplier_invoiceno')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('stock_id')->nullable();
            $table->string('supplier_code')->nullable();
            $table->string('pgroup')->nullable();
            $table->string('brand')->nullable();
            $table->string('category')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('cost',8,2)->nullable();
            $table->float('margin',8,2)->nullable();
            $table->float('sale_price',8,2)->nullable();
            $table->integer('localp_userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_purchase');
    }
}
