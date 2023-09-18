<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bus_seat_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('BusSeatNumber');
            $table->boolean('IsBooked');
            $table->integer('Fk_Bus_ID');
            $table->foreign("Fk_Bus_ID")->references("Bus_Id")->on("bus_models")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_seat_reservations');
    }
};
