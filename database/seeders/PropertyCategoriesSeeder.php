<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_categories')->insert([
            ['name' => 'Residential', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Commercial', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agricultural', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}