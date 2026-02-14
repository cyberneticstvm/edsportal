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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text("title")->nullable();
            $table->longText("content")->nullable();
            $table->string("author")->nullable();
            $table->text("intro")->nullable();
            $table->smallInteger("rating")->default(5);
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
        Schema::dropIfExists('blogs');
    }
};
