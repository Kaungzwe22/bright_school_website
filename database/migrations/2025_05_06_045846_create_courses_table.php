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
        Schema::create("courses", function (Blueprint $table) {
            $table->id();
            $table->string("course_name");
            $table->longText("image");
            $table->longText("des");
            $table->integer("normal_price");
            $table->integer("special_price");
            $table->string("duration");
            $table->integer("hours");
            $table->longText("about");
            $table->longText("included");
            $table->longText("links")->nullable();
            $table->integer("status"); // course avaliable or not

            $table->unsignedBigInteger("course_type");
            $table->foreign("course_type")->references("id")->on("course_type")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
