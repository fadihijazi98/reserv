<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_trip', function (Blueprint $table) {

            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('trip_id');

            $table->timestamps();

            $table->foreign('passenger_id')->references('id')->on('passengers')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('trip_id')->references('id')->on('trips')
                ->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passenger_trip');
    }
}
