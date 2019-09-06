<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterLcPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_lc_purchase', function (Blueprint $table) {
            $table->increments('masterlc_id');
            $table->date('lc_purdate')->nullable();
            $table->string('lc_number')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('lc_purchaseno')->nullable();
            $table->string('lc_supplierno')->nullable();
            $table->string('lc_unitetype')->nullable();
            $table->string('lc_stockid')->nullable();
            $table->string('lc_suppliercode')->nullable();
            $table->integer('lc_conrate')->nullable();
            $table->float('lc_candfbdt',8,2)->nullable();
            $table->integer('candfid')->nullable();
            $table->string('lc_group')->nullable();
            $table->string('lc_brand')->nullable();
            $table->string('lc_category')->nullable();
            $table->string('lc_designno')->nullable();
            $table->string('lc_description')->nullable();
            $table->integer('lc_pquantity')->nullable();
            $table->integer('lc_revquantity')->nullable();
            $table->integer('lc_purrate')->nullable();
            $table->integer('lc_carryingtk')->nullable();
            $table->integer('lc_costbtb')->nullable();
            $table->integer('lc_wmargin')->nullable();
            $table->integer('lc_wprice')->nullable();
            $table->integer('lc_rmargin')->nullable();
            $table->integer('lc_retailprice')->nullable();
            $table->integer('lcp_userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_lc_purchase');
    }
}
