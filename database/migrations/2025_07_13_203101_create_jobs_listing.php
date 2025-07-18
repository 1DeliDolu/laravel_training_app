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
        Schema::create('jobs_listing', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('company')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_listing');
    }
};
