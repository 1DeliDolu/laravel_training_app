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
        Schema::table('employers', function (Blueprint $table) {
            // Add user_id column if it doesn't exist
            if (!Schema::hasColumn('employers', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
            }

            // Add other columns if they don't exist
            if (!Schema::hasColumn('employers', 'company_name')) {
                $table->string('company_name')->nullable();
            }
            if (!Schema::hasColumn('employers', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('employers', 'website')) {
                $table->string('website')->nullable();
            }
            if (!Schema::hasColumn('employers', 'location')) {
                $table->string('location')->nullable();
            }
        });

        // Update existing employers to have a default user_id if needed
        $employersWithoutUser = DB::table('employers')->whereNull('user_id')->get();
        if ($employersWithoutUser->count() > 0) {
            // Create a default user if none exists
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

            // Update employers without user_id
            DB::table('employers')
                ->whereNull('user_id')
                ->update(['user_id' => $defaultUserId]);
        }

        // Update company_name for existing records if empty
        DB::table('employers')
            ->whereNull('company_name')
            ->orWhere('company_name', '')
            ->update(['company_name' => 'Default Company']);

        // Now make required columns not nullable and add foreign key
        Schema::table('employers', function (Blueprint $table) {
            if (Schema::hasColumn('employers', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable(false)->change();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (Schema::hasColumn('employers', 'company_name')) {
                $table->string('company_name')->nullable(false)->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            if (Schema::hasColumn('employers', 'user_id')) {
                $table->dropForeign(['user_id']);
            }
            $table->dropColumn(['user_id', 'company_name', 'description', 'website', 'location']);
        });
    }
};
