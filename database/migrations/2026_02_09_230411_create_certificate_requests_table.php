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
        Schema::create('certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->string("student_name")->nullable();
            $table->string("student_email")->nullable();
            $table->foreignId("course_id")->constrained()->onDelete("cascade");
            $table->string("address_1")->nullable();
            $table->string("address_2")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip_code")->nullable();
            $table->string("country")->nullable();
            $table->unsignedBigInteger("cert_id")->nullable();
            $table->unsignedBigInteger("status")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_requests');
    }
};
