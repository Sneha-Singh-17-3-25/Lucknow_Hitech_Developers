<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedStatusToPropertyTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('residential_properties', function (Blueprint $table) {
            $table->string('approved_status')->default('pending')->change();
        });

        Schema::table('commercial_properties', function (Blueprint $table) {
            $table->string('approved_status')->default('pending')->change();
        });

        Schema::table('plot_land_properties', function (Blueprint $table) {
            $table->string('approved_status')->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('residential_properties', function (Blueprint $table) {
            $table->string('approved_status')->default(null)->change();
        });

        Schema::table('commercial_properties', function (Blueprint $table) {
            $table->string('approved_status')->default(null)->change();
        });

        Schema::table('plot_land_properties', function (Blueprint $table) {
            $table->string('approved_status')->default(null)->change();
        });
    }
}
