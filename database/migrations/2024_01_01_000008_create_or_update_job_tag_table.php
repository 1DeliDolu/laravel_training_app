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
        // Check if job_tag table exists, if not create it
        if (!Schema::hasTable('job_tag')) {
            Schema::create('job_tag', function (Blueprint $table) {
                $table->id();
                $table->foreignId('jobs_listing_id')->constrained('jobs_listing')->onDelete('cascade');
                $table->foreignId('tag_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        } else {
            // Update existing job_tag table
            Schema::table('job_tag', function (Blueprint $table) {
                // Add jobs_listing_id column if it doesn't exist
                if (!Schema::hasColumn('job_tag', 'jobs_listing_id')) {
                    $table->foreignId('jobs_listing_id')->constrained('jobs_listing')->onDelete('cascade');
                }

                // Add tag_id column if it doesn't exist
                if (!Schema::hasColumn('job_tag', 'tag_id')) {
                    $table->foreignId('tag_id')->constrained()->onDelete('cascade');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tag');
    }
};
