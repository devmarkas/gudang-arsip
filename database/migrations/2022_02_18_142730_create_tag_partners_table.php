<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_partners', function (Blueprint $table) {
            $table->id();
            $table->string('id_pm');
            $table->string('pekerjaan');
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
        Schema::dropIfExists('tag_partners');
    }
}
