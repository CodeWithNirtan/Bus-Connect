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
        Schema::create('school_models', function (Blueprint $table) {
            $table->id('School_id');
            $table->string('SchoolName');
            $table->string('SchoolPrincipalName');
            $table->string('SchoolPhoneNumber');
            $table->string('SchoolEmail');
            $table->string('SchoolPassword');
            $table->integer("Fk_Area_Id");
            $table->foreign("Fk_Area_Id")->references("Area_Id")->on("area_models")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_models');
    }
};
