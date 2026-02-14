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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code")->unique()->nullable();
            $table->integer("sub_id")->nullable();
            $table->integer("parent_id")->nullable();
            $table->string("duration")->nullable();
            $table->decimal("fee", 10, 2)->nullable();
            $table->boolean("status")->default(true);
            $table->integer("order_by")->default(0);
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
