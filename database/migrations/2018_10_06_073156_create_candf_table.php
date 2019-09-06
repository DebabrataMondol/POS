<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candf', function (Blueprint $table) {
            $table->increments('candfid');
            $table->string('cf_name')->nullable();
            $table->string('cf_mobile')->nullable();
            $table->string('cf_email')->nullable();
            $table->text('cf_address')->nullable();
            $table->float('cfopaning_blance', 8,2)->nullable();
            $table->date('cf_date')->nullable();
            $table->integer('cf_userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candf');
    }
}
