<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallcoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallcovers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('hallsize');
            $table->String('colors');
            $table->double('price',8,2);
            $table->unsignedBigInteger('fac_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();


            $table->foreign('fac_id')
            ->references('id')->on('facilities')
            ->onDelete('cascade');

            $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hallcovers');
    }
}
