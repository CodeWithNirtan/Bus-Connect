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
        Schema::create('bus_models', function (Blueprint $table) {
            $table->id("Bus_Id");
            $table->string("Owner_name");
            $table->string("CNIC");
            $table->string("Owner_phone_number");
            $table->string("Bus_number_plate");
            $table->integer("Seats");
            $table->integer("Fk_areaid");
            $table->foreign("Fk_areaid")->references("Area_Id")->on("area_models")->onDelete('cascade');
            $table->integer("Driver_id")->nullable();
            $table->foreign("Driver_id")->references("Driver_Id")->on("bus_driver_models")->onDelete('cascade');
            $table->integer("School_id")->nullable();
            $table->foreign("School_id")->references("School_id")->on("school_models")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_models');
    }
};
