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
        Schema::create('comment_lists', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('company')->nullable();
            $table->string('salary')->nullable();
            $table->foreignId('job_id')->constrained('jobs_listing')->onDelete('cascade');
            $table->foreignId('comment_id')->constrained('comments')->onDelete('cascade');
            $table->foreignId('comment_list_id')->constrained('comment_lists')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
