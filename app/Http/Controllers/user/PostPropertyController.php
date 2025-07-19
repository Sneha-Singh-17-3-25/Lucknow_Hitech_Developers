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

use App\Jobs\StorePropertyJob;


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

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();
        $user = auth()->user();
        $category = $request->property_category;


        // Add photos to job
        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $filename = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('image/'), $filename); // Save temporarily
                $photoPaths[] = 'image/' . $filename;
            }
        }

        // Dispatch job
        StorePropertyJob::dispatch($validated, $category, $user, $photoPaths);

        return response()->json([
            'status' => true,
            'message' => 'Property saved successfully!',
        ]);
    }
}
