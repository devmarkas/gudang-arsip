<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpressFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impress_funds', function (Blueprint $table) {
            $table->id();
            $table->string('id_pm');
            $table->string('periode');
            $table->string('bulan');
            $table->string('teritory');
            $table->string('box');
            $table->string('status');
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
        Schema::dropIfExists('impress_funds');
    }
}
