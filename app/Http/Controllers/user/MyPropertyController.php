<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ResidentialProperty;
use App\Models\CommercialProperty;
use App\Models\PlotLandProperty;
use App\Models\Locations;

class MyPropertyController extends Controller
{
    public function myproperty()
    {
        $user = Auth::user();

        $residential = ResidentialProperty::with(['location', 'multipleImage','user'])->where('user_id', $user->id)->get();

        $commercial = CommercialProperty::with(['location', 'multipleImage','user'])->where('user_id', $user->id)->get();

        $plotLand = PlotLandProperty::with(['location', 'multipleImage','user'])->where('user_id', $user->id)->get();

        $allProperties = $residential->concat($commercial)->concat($plotLand);

        return view('landing_page.postproperty.myproperty', compact('allProperties'));
    }

    public function destroy_myproperty(Request $request)
    {
        $request->validate([
            'location_id' => 'required',
            'user_id' => 'required',
        ]);

        $location = Locations::findOrFail($request->location_id);

        $user = Auth::user();

        // Check if the user is authorized (extra safety)
        if ((int) $user->id !== (int) $request->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $location->delete();

        return response()->json(['message' => 'Property and related data deleted successfully.']);
    }
}
