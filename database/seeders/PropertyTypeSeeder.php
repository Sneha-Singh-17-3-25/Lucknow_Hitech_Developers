<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs by name
        $residentialId = DB::table('property_categories')->where('name', 'Residential')->value('id');
        $commercialId = DB::table('property_categories')->where('name', 'Commercial')->value('id');
        $agriculturalId = DB::table('property_categories')->where('name', 'Agricultural')->value('id');

        // Insert property types
        DB::table('property_types')->insert([
            // Residential
            ['property_category_id' => $residentialId, 'property_type' => 'Flat/Apartment', 'icon_class' => 'fa-building', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $residentialId, 'property_type' => 'Residential House', 'icon_class' => 'fa-home', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $residentialId, 'property_type' => 'Villa', 'icon_class' => 'fa-th', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $residentialId, 'property_type' => 'Independent House', 'icon_class' => 'fa-hotel', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $residentialId, 'property_type' => 'Farm House', 'icon_class' => 'fa-tractor', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $residentialId, 'property_type' => 'Pent House', 'icon_class' => 'fa-city', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $residentialId, 'property_type' => 'Residential Plot/Land', 'icon_class' => 'fa-chart-area', 'created_at' => now(), 'updated_at' => now()],

            // Commercial
            ['property_category_id' => $commercialId, 'property_type' => 'Office Space', 'icon_class' => 'fa-building', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $commercialId, 'property_type' => 'Shop/Showroom', 'icon_class' => 'fa-store', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $commercialId, 'property_type' => 'Warehouse/Godown', 'icon_class' => 'fa-warehouse', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $commercialId, 'property_type' => 'Industrial Building', 'icon_class' => 'fa-industry', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $commercialId, 'property_type' => 'Industrial Land', 'icon_class' => 'fa-city', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $commercialId, 'property_type' => 'Commercial Land/Plot', 'icon_class' => 'fa-chart-area', 'created_at' => now(), 'updated_at' => now()],
            ['property_category_id' => $commercialId, 'property_type' => 'Agricultural Land', 'icon_class' => 'fa-seedling', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
