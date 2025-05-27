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
        Schema::create('residential_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->string('property_type');
            $table->string('want_for'); // e.g., 'buy' or 'rent'
            $table->string('poss_status'); // e.g., 'ready_to_move', 'under_construction'
            $table->decimal('plot_area', 10, 2)->nullable();
            $table->string('plot_area_unit', 20)->nullable(); // e.g., sq-ft, sq-m, etc.
            $table->decimal('super_area', 10, 2)->nullable();
            $table->string('super_area_unit', 20)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('balconies')->nullable();
            $table->integer('total_rooms')->nullable();
            $table->integer('total_floors')->nullable();
            $table->string('furnished_status')->nullable(); // e.g., 'furnished', 'semi-furnished'
            $table->integer('bathrooms')->nullable();
            $table->integer('open_sides')->nullable();
            $table->decimal('w_road_facing', 10, 2)->nullable();
            $table->string('w_road_facing_unit', 20)->nullable();
            $table->boolean('leased_out')->default(false);
            $table->decimal('property_price', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residential_properties');
    }
};
