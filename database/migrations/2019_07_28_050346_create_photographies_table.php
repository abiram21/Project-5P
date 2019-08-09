<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('time_duration'); 
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
        Schema::dropIfExists('photographies');
    }
}
