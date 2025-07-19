<?php

namespace App\Jobs;

use App\Models\Locations;
use App\Models\ResidentialProperty;
use App\Models\CommercialProperty;
use App\Models\PlotLandProperty;
use App\Models\PropertiesImages;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\JobError;
use Exception;
 // Assuming JobA is defined in the same namespace

class StorePropertyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $validated;
    protected $category;
    protected $user;
    protected $photoPaths;

    public function __construct($validated, $category, $user, $photoPaths = [])
    {
        $this->validated = $validated;
        $this->category = $category;
        $this->user = $user;
        $this->photoPaths = $photoPaths;
    }

    

    public function handle(): void
    {
        try {
            // Start DB Transaction (optional but good practice)
            DB::beginTransaction();

            // Create location
            $location = Locations::create([
                'pincode' => $this->validated['pincode'],
                'city' => $this->validated['city'],
                'state' => $this->validated['state'],
                'address' => $this->validated['address'],
            ]);

            if ($this->category === 'residential') {
                ResidentialProperty::create([
                    'location_id' => $location->id,
                    'user_id' => $this->user->id,
                    'want_for' => $this->validated['want_for'],
                    'property_type' => $this->validated['res_property_type_hidden'],
                    'poss_status' => $this->validated['possession_status'],
                    'plot_area' => $this->validated['res_plot_area'],
                    'plot_area_unit' => $this->validated['res_plot_area_unit'],
                    'super_area' => $this->validated['res_super_area'],
                    'super_area_unit' => $this->validated['res_super_area_unit'],
                    'bedrooms' => $this->validated['res_bedrooms'],
                    'balconies' => $this->validated['res_balconies'],
                    'total_rooms' => $this->validated['res_rooms'],
                    'total_floor' => $this->validated['res_total_floors'],
                    'furnished_status' => $this->validated['res_furnished'],
                    'bathrooms' => $this->validated['res_bathrooms'],
                    'open_sides' => $this->validated['res_no_open_sides'],
                    'w_road_facing' => $this->validated['res_road_facing_plot'],
                    'w_road_facing_unit' => $this->validated['res_road_facing_plot_unit'],
                    'leased_out' => $this->validated['currleasedout'],
                    'property_price' => $this->validated['expect_price'],
                ]);
            }

            if ($this->category === 'commercial') {
                CommercialProperty::create([
                    'location_id' => $location->id,
                    'user_id' => $this->user->id,
                    'want_for' => $this->validated['want_for'],
                    'poss_status' => $this->validated['possession_status'],
                    'leased_out' => $this->validated['currleasedout'],
                    'property_price' => $this->validated['expect_price'],
                    'property_type' => $this->validated['commer_property_type'],
                    'plot_area' => $this->validated['commer_plot_area'],
                    'plot_area_unit' => $this->validated['commer_plot_area_unit'],
                    'super_area' => $this->validated['commer_super_area'],
                    'super_area_unit' => $this->validated['commer_super_area_unit'],
                    'floor_no' => $this->validated['commer_floor_no'],
                    'total_floor' => $this->validated['commer_total_floor'],
                    'furnished_status' => $this->validated['commer_furnished_status'],
                    'washrooms' => $this->validated['commer_washrooms'],
                    'per_washrooms' => $this->validated['commer_perwashroom'],
                    'pantry_cafeteria' => $this->validated['commer_pantry'],
                ]);
            }

            if ($this->category === 'plotland') {
                PlotLandProperty::create([
                    'location_id' => $location->id,
                    'user_id' => $this->user->id,
                    'want_for' => $this->validated['want_for'],
                    'poss_status' => $this->validated['possession_status'],
                    'leased_out' => $this->validated['currleasedout'],
                    'property_price' => $this->validated['expect_price'],
                    'property_type' => $this->validated['plotland_property_type'],
                    'open_sides' => $this->validated['common_no_open_sides'],
                    'w_road_facing' => $this->validated['common_w_road_facing'],
                    'w_road_facing_unit' => $this->validated['common_w_road_facing_unit'],
                    'corner_plot' => $this->validated['common_cornerplot'],
                    'const_plot' => $this->validated['common_construction'],
                    'boundary_wall_made' => $this->validated['common_boundaryWall'],
                    'plot_area' => $this->validated['common_plotland_area'] ?? 0,
                    'plot_area_unit' => $this->validated['common_plotland_area_unit'],
                    'plot_land_length' => $this->validated['common_plotland_length'],
                    'plot_land_length_unit' => $this->validated['common_plotland_length_unit'],
                    'plot_land_breath' => $this->validated['common_plotland_breath'],
                    'plot_land_breath_unit' => $this->validated['common_plotland_breath_unit'],
                ]);
            }
         

            // Ensure destination folder exists
            $imageDir = public_path('image');
            if (!File::exists($imageDir)) {
                File::makeDirectory($imageDir, 0755, true);
            }

            foreach ($this->photoPaths as $index => $path) {
                try {
                    $filename = basename($path);
                    $oldFull = public_path($path);
                    $newName = 'image/' . $filename;
                    $newFull = public_path($newName);

                    if (!file_exists($oldFull)) {
                        Log::warning("StorePropertyJob: File not found", ['path' => $oldFull]);
                        continue;
                    }

                    if (!rename($oldFull, $newFull)) {
                        Log::error("StorePropertyJob: Failed to move file", ['from' => $oldFull, 'to' => $newFull]);
                        continue;
                    }

                    $img = PropertiesImages::create([
                        'location_id' => $location->id, 
                        'image' => $newName,
                        'is_default' => $index === 0,
                    ]);

                    Log::info("Image saved", ['id' => $img->id]);
                } catch (\Exception $e) {
                    Log::error("Error saving image", [
                        'error' => $e->getMessage(),
                        'path' => $path,
                    ]);
                }
            }


            DB::commit(); 
        } catch (Exception $e) {
            DB::rollBack(); 
            JobError::create([
                'job_name' => self::class,
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'payload' => json_encode($this->validated),
            ]);

            throw $e;
        }
    }
}
