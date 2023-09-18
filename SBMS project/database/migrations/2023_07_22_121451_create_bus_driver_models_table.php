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
        Schema::create('bus_driver_models', function (Blueprint $table) {
            $table->id("Driver_Id");
            $table->string('BusDriverName');
            $table->string('BusDriverPhoneNumber');
            $table->string('BusDriverCNICNumber');
            $table->string('BusDriverLicense');
            $table->string('image');
            $table->integer('Age');
            $table->string('Gender');
            $table->integer('Area_Fk_Id');
            $table->foreign("Area_Fk_Id")->references("Area_Id")->on("area_models")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_driver_models');
    }
};
