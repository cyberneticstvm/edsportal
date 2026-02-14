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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string("student_name")->nullable();
            $table->string("student_email")->nullable();
            $table->string("student_phone")->nullable();
            $table->string("ref_name")->nullable();
            $table->string("ref_email")->nullable();
            $table->string("ref_phone")->nullable();
            $table->foreignId("course_id")->constrained()->onDelete("cascade");
            $table->text("comments")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
