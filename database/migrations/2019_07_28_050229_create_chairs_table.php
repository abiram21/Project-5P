<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type'); 
            $table->string('extension'); 
            $table->string('range');
            $table->double('price_per_coveredchair',4,2);
            $table->double('price_per_uncoveredchair',4,2);
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
        Schema::dropIfExists('chairs');
    }
}
