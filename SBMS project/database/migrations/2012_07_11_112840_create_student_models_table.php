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
        Schema::create('student_models', function (Blueprint $table) {
            $table->id("Student_id");
            $table->string("Student_full_name");
            $table->string("Student_class");
            $table->string("Student_age");
            $table->string("Parents_number");
            $table->string("Student_Email");
            $table->string("Student_Password");
            $table->uuid("Fk_Parent_id");
            $table->foreign("Fk_Parent_id")->references("id")->on("parent_models")->onDelete('cascade');
            $table->integer("Fk_area");
            $table->foreign("Fk_area")->references("Area_Id")->on("area_models")->onDelete('cascade');
            $table->integer("Fk_bus");
            $table->foreign("Fk_bus")->references("Bus_Id")->on("bus_models")->onDelete('cascade');
            $table->integer("Fk_bus_seat");
            $table->foreign("Fk_bus_seat")->references("Seat_Id")->on("bus_seat_reservations")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_models');
    }
};
