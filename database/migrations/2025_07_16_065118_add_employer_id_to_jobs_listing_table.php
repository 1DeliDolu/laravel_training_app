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
        Schema::table('jobs_listing', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs_listing', 'employer_id')) {
                $table->unsignedBigInteger('employer_id')->nullable()->after('salary');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs_listing', function (Blueprint $table) {
            if (Schema::hasColumn('jobs_listing', 'employer_id')) {
                $table->dropColumn('employer_id');
            }
        });
    }
};
