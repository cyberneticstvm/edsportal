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
        Schema::create('form_submits', function (Blueprint $table) {
            $table->id();
            $table->string("contact_name")->nullable();
            $table->string("contact_email")->nullable();
            $table->string("contact_phone")->nullable();
            $table->string("course")->nullable();
            $table->string("trainer")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->unsignedBigInteger("submit_type")->nullable();
            $table->text("message")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submits');
    }
};
