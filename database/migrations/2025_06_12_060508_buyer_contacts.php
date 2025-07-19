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
        Schema::create('buyer_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('property_type');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('buyer_name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->boolean('agree_to_contact')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_contacts');
    }
};
