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
use App\Models\JobError;
use Exception;

class StorePropertyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $validated;
    protected $category;
    protected $user;
    protected $photos;

    public function __construct($validated, $category, $user, $photos = [])
    {
        $this->validated = $validated;
        $this->category = $category;
        $this->user = $user;
        $this->photos = $photos;
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
                    'total_floors' => $this->validated['res_total_floors'],
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
                    'price' => $this->validated['expect_price'],
                    'property_type' => $this->validated['commer_property_type'],
                    'plot_area' => $this->validated['commer_plot_area'],
                    'plot_area_unit' => $this->validated['commer_plot_area_unit'],
                    'super_area' => $this->validated['commer_super_area'],
                    'super_area_unit' => $this->validated['commer_super_area_unit'],
                    'floor_no' => $this->validated['commer_floor_no'],
                    'total_floor' => $this->validated['commer_total_floor'],
                    'furnished_status' => $this->validated['commer_furnished_status'],
                    'washrooms' => $this->validated['commer_washrooms'],
                    'per_washroom' => $this->validated['commer_perwashroom'],
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
                    'price' => $this->validated['expect_price'],
                    'property_type' => $this->validated['plotland_property_type'],
                    'no_open_sides' => $this->validated['common_no_open_sides'],
                    'w_road_facing' => $this->validated['common_w_road_facing'],
                    'w_road_facing_unit' => $this->validated['common_w_road_facing_unit'],
                    'corner_plot' => $this->validated['common_cornerplot'],
                    'const_plot' => $this->validated['common_construction'],
                    'boundary_wall_made' => $this->validated['common_boundaryWall'],
                    'plot_land_area' => $this->validated['common_plotland_area'] ?? 0,
                    'plot_land_area_unit' => $this->validated['common_plotland_area_unit'],
                    'plot_land_length' => $this->validated['common_plotland_length'],
                    'plot_land_length_unit' => $this->validated['common_plotland_length_unit'],
                    'plot_land_breath' => $this->validated['common_plotland_breath'],
                    'plot_land_breath_unit' => $this->validated['common_plotland_breath_unit'],
                ]);
            }

            foreach ($this->photos as $photo) {
                $imageName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('images'), $imageName); // save to public/images

                PropertiesImages::create([
                    'location_id' => $location->id, // assuming this foreign key
                    'image_path' => 'images/' . $imageName,
                ]);
            }

            DB::commit(); // Commit if all good
        } catch (Exception $e) {
            DB::rollBack(); // Rollback if error

            JobError::create([
                'job_name' => self::class,
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'payload' => json_encode($this->validated),
            ]);

            // Optionally rethrow if you want it to be marked as failed
            throw $e;
        }
    }
}
