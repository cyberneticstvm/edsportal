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
        Schema::create('eds_referrals', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name")->nullable();
            $table->string("email");
            $table->foreignId("course_id")->constrained()->onDelete("cascade");
            $table->date("registration_date")->nullable();
            $table->string("referral_code")->nullable();
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
        Schema::dropIfExists('eds_referrals');
    }
};
