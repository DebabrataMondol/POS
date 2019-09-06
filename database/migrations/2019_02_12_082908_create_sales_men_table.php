<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_men', function (Blueprint $table) {
            $table->increments('salesMan_id');
            $table->string('salesMan_name')->nullable();
            $table->string('salesMan_mobile')->nullable();
            $table->string('salesMan_address')->nullable();
            $table->string('salesMan_status')->nullable();
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
        Schema::dropIfExists('sales_men');
    }
}
