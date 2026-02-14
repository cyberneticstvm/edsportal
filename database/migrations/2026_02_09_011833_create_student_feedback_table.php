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
        Schema::create('student_feedback', function (Blueprint $table) {
            $table->id();
            $table->string("student_name");
            $table->string("trainer_name");
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->longText("feedback")->nullable();
            $table->dateTime("feedback_date")->nullable();
            $table->boolean("status")->default(false)->nullable();
            $table->smallInteger("rating")->default(0);
            $table->string("ip_address")->nullable();
            $table->string("location")->nullable();
            $table->string("country")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_feedback');
    }
};
