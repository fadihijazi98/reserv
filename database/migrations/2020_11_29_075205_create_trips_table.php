<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {

            $table->id();

            $table->date('date');
            $table->time('hour');

            $table->unsignedBigInteger('id_driver');
            $table->unsignedBigInteger('id_destination');

            $table->timestamps();

            $table->foreign('id_driver')->references('id')->on('drivers')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_destination')->references('id')->on('destinations')
                ->cascadeOnDelete()->cascadeOnUpdate();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
