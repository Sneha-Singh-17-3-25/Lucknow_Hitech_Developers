<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ResidentialProperty;
use App\Models\CommercialProperty;
use App\Models\PlotLandProperty;
use App\Models\Locations;
use App\Models\PropertiesImages;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostPropertyDetailsController extends Controller
{
    public function postpropertydetails(Request $request)
    {
        $locationId = $request->query('location_id');
        $propertyType = $request->query('property_type');

        // Initialize variables
        $property = null;
        $location = null;
        $images = collect(); // Initialize as an empty collection


        if (empty($locationId) || empty($propertyType)) {
            return redirect()->route('landing_index')->with('error', 'Property ID or Type not provided.');
        }

        // 3. Conditionally fetch property data based on property_type
        switch ($propertyType) {
            case 'ResidentialProperty':
                $property = DB::table('residential_properties')->where('location_id', $locationId)->first();
                break;
            case 'CommercialProperty':
                $property = DB::table('commercial_properties')->where('location_id', $locationId)->first();
                break;
            case 'PlotLandProperty':
                $property = DB::table('plot_land_properties')->where('location_id', $locationId)->first();
                break;
            default:
                return redirect()->route('/')->with('error', 'Invalid property type specified.');
        }

        if (!$property) {
            return redirect()->route('/')->with('error', 'The requested property could not be found.');
        }

        if ($property->location_id) {
            $location = DB::table('locations')->where('id', $locationId)->first();
        }

        if (!$location) {
            error_log("Location not found for property ID: {$property->id}, Type: {$propertyType}");
        }

        $images = DB::table('properties_images')
            ->where('location_id', $property->location_id)
            ->get();

        return view('landing_page/postproperty/postpropertydetails', compact('property', 'location', 'images', 'propertyType'));
    }


    public function buyercontactinsert(Request $request)
    {
        DB::table('buyer_contacts')->insert([
            'property_type' => $request->input('property_type'),
            'property_id' => $request->input('property_id'),
            'seller_id' => $request->input('seller_id'),
            'buyer_name' => $request->input('name'),
            'mobile' => $request->input('phone'),
            'email' => $request->input('email'),
            'agree_to_contact' => $request->input('agree_to_contact') ? 1 : 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => 'buyer contacts inserted successfully!',
            'data' => [
                'property_type' => $request->input('property_type'),
                'property_id' => $request->input('property_id'),
                'seller_id' => $request->input('seller_id'),
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'agree_to_contact' => $request->input('agree_to_contact') ? true : false,
            ]
        ]);
    }
}
