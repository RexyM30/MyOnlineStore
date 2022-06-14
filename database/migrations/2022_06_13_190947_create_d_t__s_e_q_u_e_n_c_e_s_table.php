<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDTSEQUENCESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DT_SEQUENCE', function (Blueprint $table) {
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
        Schema::dropIfExists('DT_SEQUENCE');
    }
}
