<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSUSERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MS_USER', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('namadepan');
            $table->string('namatengah');
            $table->string('namabelakang');
            $table->string('email');
            $table->string('password');
            $table->string('statusaktif');
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
        Schema::dropIfExists('MS_ALAMAT');
    }
}
