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
        Schema::create('commercial_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->string('property_type');
            $table->string('want_for');
            $table->string('poss_status')->nullable();
            $table->decimal('plot_area', 10, 2)->nullable();
            $table->string('plot_area_unit')->nullable();
            $table->decimal('super_area', 10, 2)->nullable();
            $table->string('super_area_unit')->nullable();
            $table->integer('floor_no')->nullable();
            $table->integer('total_floor')->nullable();
            $table->string('furnished_status')->nullable();
            $table->integer('washrooms')->nullable();
            $table->integer('per_washrooms')->nullable();
            $table->boolean('pantry_cafeteria')->default(false); // Use underscore, not slash
            $table->boolean('leased_out')->default(false);
            $table->decimal('price', 15, 2)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial_properties');
    }
};