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
        Schema::table('tags', function (Blueprint $table) {
            // Add name column if it doesn't exist
            if (!Schema::hasColumn('tags', 'name')) {
                $table->string('name');
            }

            // Add unique constraint to name if it doesn't exist
            if (Schema::hasColumn('tags', 'name')) {
                $table->unique('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            if (Schema::hasColumn('tags', 'name')) {
                $table->dropUnique(['name']);
            }
        });
    }
};
