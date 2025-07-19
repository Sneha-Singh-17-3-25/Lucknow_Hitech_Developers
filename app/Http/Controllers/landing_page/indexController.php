<?php

namespace App\Http\Controllers\landing_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResidentialProperty;
use App\Models\CommercialProperty;
use App\Models\PlotLandProperty;
use App\Models\Locations;

class indexController extends Controller
{
   public function landing_index()
   {
      return view('landing_page.index');
   }


   public function searchproperties(Request $request)
   {
      $keyword = strtolower($request->get('keyword'));

      // Filter Residential
      $residential = ResidentialProperty::with('location')
         ->whereRaw('LOWER(type) LIKE ?', ["%$keyword%"])
         ->orWhereHas('location', function ($q) use ($keyword) {
            $q->whereRaw('LOWER(address) LIKE ?', ["%$keyword%"])
               ->orWhereRaw('LOWER(city) LIKE ?', ["%$keyword%"]);
         })
         ->get();

      // Filter Commercial
      $commercial = CommercialProperty::with('location')
         ->whereRaw('LOWER(type) LIKE ?', ["%$keyword%"])
         ->orWhereHas('location', function ($q) use ($keyword) {
            $q->whereRaw('LOWER(address) LIKE ?', ["%$keyword%"])
               ->orWhereRaw('LOWER(city) LIKE ?', ["%$keyword%"]);
         })
         ->get();

      // Filter PlotLand
      $plotLand = PlotLandProperty::with('location')
         ->whereRaw('LOWER(type) LIKE ?', ["%$keyword%"])
         ->orWhereHas('location', function ($q) use ($keyword) {
            $q->whereRaw('LOWER(address) LIKE ?', ["%$keyword%"])
               ->orWhereRaw('LOWER(city) LIKE ?', ["%$keyword%"]);
         })
         ->get();

      // Merge all
      $allProperties = $residential->concat($commercial)->concat($plotLand);

      return response()->json($allProperties->values()); // send JSON for AJAX
   }
}
