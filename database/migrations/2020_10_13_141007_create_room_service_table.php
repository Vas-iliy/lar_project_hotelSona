<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_service', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('services');

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
        Schema::dropIfExists('room_service');
    }
}
