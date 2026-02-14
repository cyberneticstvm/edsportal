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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email", 50)->nullable();
            $table->string("phone", 50)->nullable();
            $table->date("response_date")->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger("status")->nullable();
            $table->unsignedBigInteger("referred_by")->nullable();
            $table->text("comments")->nullable();
            $table->foreignId("created_by")->constrained("users", "id");
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
