<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSSEQUENCESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MS_SEQUENCE', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Type');
            $table->string('Month');
            $table->string('Year');
            $table->integer('NextSequence');
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
        Schema::dropIfExists('MS_SEQUENCE');
    }
}
