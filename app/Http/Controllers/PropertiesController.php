<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{

   // show the all properties
   public function property_index()
   {

      $residential = DB::table('residential_properties as rp')
         ->join('users as u', 'rp.user_id', '=', 'u.id')
         ->select(

            'u.name as name',
            'u.email as email',
            'u.mobile as phone',
            'rp.property_type',
            'rp.location_id',
            'rp.user_id',
            'rp.want_for',
            'rp.poss_status',
            'rp.plot_area',
            'rp.plot_area_unit',
            'rp.furnished_status as furnished',
            'rp.leased_out',
            'rp.property_price as price',
            'rp.approved_status',
         );

      $commercial = DB::table('commercial_properties as cp')
         ->join('users as u', 'cp.user_id', '=', 'u.id')
         ->select(
            'u.name as name',
            'u.email as email',
            'u.mobile as phone',
            'cp.property_type',
            'cp.location_id',
            'cp.user_id',
            'cp.want_for',
            'cp.poss_status',
            'cp.plot_area',
            'cp.plot_area_unit',
            'cp.furnished_status as furnished',
            'cp.leased_out',
            'cp.property_price as price',
            'cp.approved_status',
         );

      $plotland = DB::table('plot_land_properties as pp')
         ->join('users as u', 'pp.user_id', '=', 'u.id')
         ->select(
            'u.name as name',
            'u.email as email',
            'u.mobile as phone',
            'pp.property_type',
            'pp.location_id',
            'pp.user_id',
            'pp.want_for',
            'pp.poss_status',
            'pp.plot_area',
            'pp.plot_area_unit',
            DB::raw("'N/A' as furnished"),
            'pp.leased_out',
            'pp.property_price as price',
            'pp.approved_status'
         );

      $allProperties = $residential
         ->unionAll($commercial)
         ->unionAll($plotland)
         ->get();

      return view('Properties.properties ', compact('allProperties'));
   }
   public function property_create()
   {
      return view('Properties.property-create');
   }



   // update the property status approved , reject , pending 
   public function updatePropertyStatus(Request $request, $locationId)
   {
      $request->validate([
         'status' => 'required|in:approved,rejected,pending',
         'property_type' => 'nullable|string'
      ]);

      $locationId = $request->locationId;
      $propertyType = $request->property_type;
      $status = $request->status;

      $residentialTypes = [
         'flat/apartment',
         'Residential House',
         'Villa',
         'Independent House',
         'Farm House',
         'Pent House',
      ];

      $commercialTypes = [
         'Office Space',
         'Shop/Showroom',
         'Warehouse/Godown',
         'Industrial Building',
      ];

      $landTypes = [
         'Residential Plot/Land',
         'Industrial Land',
         'Commercial Land/Plot',
         'Agricultural Land',
      ];


      if (in_array($propertyType, $residentialTypes)) {
         DB::table('residential_properties')
            ->where('location_id', $locationId)
            ->update(['approved_status' => $status]);

         return response()->json([
            'success' => true,
            'message' => 'Residential property status updated.'
         ], 200);
      } elseif (in_array($propertyType, $commercialTypes)) {
         DB::table('commercial_properties')
            ->where('location_id', $locationId)
            ->update(['approved_status' => $status]);

         return response()->json([
            'success' => true,
            'message' => 'Commercial property status updated.'
         ], 200);
      } elseif (in_array($propertyType, $landTypes)) {
         DB::table('plot_land_properties')
            ->where('location_id', $locationId)
            ->update(['approved_status' => $status]);

         return response()->json([
            'success' => true,
            'message' => 'Plot land property status updated.'
         ], 200);
      }


      return response()->json(['message' => 'Property type not matched. No action taken.']);
   }
}
