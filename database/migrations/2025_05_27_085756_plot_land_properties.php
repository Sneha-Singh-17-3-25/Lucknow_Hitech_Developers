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
        Schema::create('plot_land_properties', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            // Property details
            $table->string('property_type');         
            $table->string('want_for');               
            $table->string('poss_status')->nullable(); 

            // Plot specifics
            $table->integer('open_sides')->nullable();
            $table->decimal('w_road_facing', 10, 2)->nullable();     
            $table->string('w_road_facing_unit')->nullable();      
            $table->boolean('corner_plot')->default(false);
            $table->boolean('const_plot')->default(false);           
            $table->boolean('boundary_wall_made')->default(false);

            // Area details
            $table->decimal('plot_area', 10, 2);
            $table->string('plot_area_unit');                  
            $table->decimal('plot_land_length', 10, 2)->nullable();
            $table->string('plot_land_length_unit')->nullable();

            $table->decimal('plot_land_breath', 10, 2)->nullable();
            $table->string('plot_land_breath_unit')->nullable();

            // Lease and price
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
        Schema::dropIfExists('plot_land_properties');
    }
};