<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSCATEGORYSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MS_CATEGORY', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kategori');
            $table->string('nama_kategori');
            $table->string('status');
            $table->string('foto')->nullable(); //foto atau banner kategori
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
        Schema::dropIfExists('MS_CATEGORY');
    }
}
