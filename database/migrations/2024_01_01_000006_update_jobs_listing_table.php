<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, let's check if employer_id column exists
        if (!Schema::hasColumn('jobs_listing', 'employer_id')) {
            // Add employer_id column without foreign key constraint first
            Schema::table('jobs_listing', function (Blueprint $table) {
                $table->unsignedBigInteger('employer_id')->nullable();
            });

            // Create a default employer if none exists
            $defaultEmployer = DB::table('employers')->first();
            if (!$defaultEmployer) {
                // Create a default user first if needed
                $defaultUser = DB::table('users')->first();
                if (!$defaultUser) {
                    $defaultUserId = DB::table('users')->insertGetId([
                        'name' => 'Default User',
                        'email' => 'default@example.com',
                        'password' => bcrypt('password'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                } else {
                    $defaultUserId = $defaultUser->id;
                }

                // Create default employer
                $defaultEmployerId = DB::table('employers')->insertGetId([
                    'user_id' => $defaultUserId,
                    'company_name' => 'Default Company',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                $defaultEmployerId = $defaultEmployer->id;
            }

            // Update all existing jobs to have the default employer_id
            DB::table('jobs_listing')
                ->whereNull('employer_id')
                ->update(['employer_id' => $defaultEmployerId]);

            // Now make the column not nullable and add foreign key constraint
            Schema::table('jobs_listing', function (Blueprint $table) {
                $table->unsignedBigInteger('employer_id')->nullable(false)->change();
                $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            });
        }

        // Add other columns if needed
        Schema::table('jobs_listing', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs_listing', 'description')) {
                $table->text('description')->nullable();
            }

            // Check if salary column exists and modify if needed
            if (Schema::hasColumn('jobs_listing', 'salary')) {
                $table->decimal('salary', 10, 2)->change();
            } else {
                $table->decimal('salary', 10, 2);
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
                $table->dropForeign(['employer_id']);
                $table->dropColumn('employer_id');
            }
        });
    }
};
