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
        Schema::create('properties_images', function (Blueprint $table) {
            $table->id(); // value-1
            $table->unsignedBigInteger('location_id'); // value-2
            $table->string('image'); // value-3
            $table->timestamps(); // value-4 (created_at), value-5 (updated_at)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties_images');
    }
};
