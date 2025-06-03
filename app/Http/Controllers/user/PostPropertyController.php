<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use App\Models\ResidentialProperty;
use App\Models\CommercialProperty;
use App\Models\PlotLandProperty;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostPropertyController extends Controller
{
    public function postproperty()
    {
        // dd('hi');
        $ResidentialProperty = DB::table('property_types')->where('property_category_id', 1)->get();
        $CommercialProperty = DB::table('property_types')->where('property_category_id', 2)->get();
        $PlotLandProperty = DB::table('property_types')->where('property_category_id', 3)->get();
        // dd($ResidentialProperty);
        return view('landing_page/postproperty/postproperty', compact('ResidentialProperty', 'CommercialProperty', 'PlotLandProperty'));
    }


    public function storeResidentialProperty(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'pincode' => 'required|digits:6',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'address' => 'required|string|max:255',

            'want_for' => 'required',
            'possession_status' => 'required',
            'currleasedout' => 'required',
            'expect_price' => 'required|numeric|min:0',

            // residential
            'res_property_type_hidden' => 'string',
            'res_plot_area' => 'numeric',
            'res_plot_area_unit' => 'string',
            'res_super_area' => 'numeric|min:0',
            'res_super_area_unit' => 'nullable',
            'res_bedrooms' => 'string',
            'res_balconies' => 'string',
            'res_rooms' => 'string',
            'res_total_floors' => 'string',
            'res_bathrooms' => 'string',
            'res_furnished' => 'nullable|string',
            'res_no_open_sides' => 'nullable',
            'res_road_facing_plot' => 'nullable|numeric',
            'res_road_facing_plot_unit' => 'nullable',



            //commercial
            'commer_property_type' => 'string',
            'commer_plot_area' => 'numeric|min:0',
            'commer_plot_area_unit' => 'string',
            'commer_super_area' => 'nullable|numeric|min:0',
            'commer_super_area_unit' => 'nullable',
            'commer_floor_no' => 'string',
            'commer_total_floor' => 'string',
            'commer_furnished_status' => 'nullable',
            'commer_washrooms' => 'string',
            'commer_perwashroom' => 'string',
            'commer_pantry' => 'nullable',
            'created_at' => now(),
            'updated_at' => now(),


            // common    
            'plotland_property_type' => 'string',
            'common_no_open_sides' => 'string',
            'common_w_road_facing' => 'numeric',
            'common_w_road_facing_unit' => 'string',
            'common_cornerplot' => 'string',
            'common_construction' => 'string',
            'common_boundaryWall' => 'string',
            'common_plotland_area' => 'numeric|min:0',
            'common_plotland_area_unit' => 'string',
            'common_plotland_length' => 'nullable|numeric|min:0',
            'common_plotland_length_unit' => 'string',
            'common_plotland_breath' => 'nullable|numeric|min:0',
            'common_plotland_breath_unit' => 'string',

        ]);

        $category = $request->property_category;


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();


        $location = Locations::create([
            'pincode' => $validated['pincode'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'address' => $validated['address'],
        ]);

        if ($category == 'residential') {
            $residentialProperty = ResidentialProperty::create([
                'location_id'           => $location->id,
                'want_for'              => $validated['want_for'],
                'property_type'         => $validated['res_property_type_hidden'],
                'poss_status'           => $validated['possession_status'],
                'plot_area'             => $validated['res_plot_area'],
                'plot_area_unit'        => $validated['res_plot_area_unit'],
                'super_area'            => $validated['res_super_area'],
                'super_area_unit'       => $validated['res_super_area_unit'],
                'bedrooms'              => $validated['res_bedrooms'],
                'balconies'             => $validated['res_balconies'],
                'total_rooms'           => $validated['res_rooms'],
                'total_floors'          => $validated['res_total_floors'],
                'furnished_status'      => $validated['res_furnished'],
                'bathrooms'             => $validated['res_bathrooms'],
                'open_sides'            => $validated['res_no_open_sides'],
                'w_road_facing'         => $validated['res_road_facing_plot'],
                'w_road_facing_unit'    => $validated['res_road_facing_plot_unit'],
                'leased_out'            => $validated['currleasedout'],
                'property_price'        => $validated['expect_price'],
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }


        if ($category == 'commercial') {
            $commercialProperty = CommercialProperty::create([
                'location_id'      => $location->id,
                'want_for'         => $validated['want_for'],
                'poss_status'      => $validated['possession_status'],
                'leased_out'       => $validated['currleasedout'],
                'price'            => $validated['expect_price'],

                'property_type'    => $validated['commer_property_type'],
                'plot_area'        => $validated['commer_plot_area'],
                'plot_area_unit'   => $validated['commer_plot_area_unit'],
                'super_area'       => $validated['commer_super_area'],
                'super_area_unit'  => $validated['commer_super_area_unit'],
                'floor_no'         => $validated['commer_floor_no'],
                'total_floor'      => $validated['commer_total_floor'],
                'furnished_status' => $validated['commer_furnished_status'],
                'washrooms'        => $validated['commer_washrooms'],
                'per_washroom'     => $validated['commer_perwashroom'],
                'pantry_cafeteria' => $validated['commer_pantry'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($category == 'plotland') {
            $plotLandProperty = PlotLandProperty::create([
                'location_id'              => $location->id,
                'want_for'                 => $validated['want_for'],
                'poss_status'              => $validated['possession_status'],
                'leased_out'               => $validated['currleasedout'],
                'price'                    => $validated['expect_price'],

                'property_type'            => $validated['plotland_property_type'],
                'no_open_sides'            => $validated['common_no_open_sides'],
                'w_road_facing'            => $validated['common_w_road_facing'],
                'w_road_facing_unit'       => $validated['common_w_road_facing_unit'],
                'corner_plot'              => $validated['common_cornerplot'],
                'const_plot'                => $validated['common_construction'],
                'boundary_wall_made'        => $validated['common_boundaryWall'],
                'plot_land_area'                => $validated['common_plotland_area'] ?? 0,
                'plot_land_area_unit'           => $validated['common_plotland_area_unit'],
                'plot_land_length'              => $validated['common_plotland_length'],
                'plot_land_length_unit'         => $validated['common_plotland_length_unit'],
                'plot_land_breath'              => $validated['common_plotland_breath'],
                'plot_land_breath_unit'         => $validated['common_plotland_breath_unit'],
            ]);
        }


        return response()->json([
            'status' => true,
            'message' => 'Property created successfully!',

        ]);
    }
}
