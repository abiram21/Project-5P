<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility__functions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fac_id');
            $table->unsignedBigInteger('func_id');
            $table->timestamps();

//foreign key realtions
            $table->foreign('fac_id')
            ->references('id')->on('facilities')
            ->onDelete('cascade');

            $table->foreign('func_id')
            ->references('id')->on('functions')
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
        Schema::dropIfExists('facility__functions');
    }
}
