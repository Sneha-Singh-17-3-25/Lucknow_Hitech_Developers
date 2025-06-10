<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ResidentialProperty;
use App\Models\CommercialProperty;
use App\Models\PlotLandProperty;

class PropertyController extends Controller
{
    public function allProperties()
    {
        $residential = ResidentialProperty::with(['location', 'firstImage'])->get();
        $commercial = CommercialProperty::with(['location', 'firstImage'])->get();
        $plotLand = PlotLandProperty::with(['location', 'firstImage'])->get();

        // Combine all properties into one collection
        $allProperties = $residential->concat($commercial)->concat($plotLand);

        // Format for frontend: normalize keys (title, price, location, image, etc.)
        $formatted = $allProperties->map(function ($property) {
            return [
                'id' => $property->id,
                'title' => $property->property_type ?? $property->type ?? 'No Title',
                'location' => $property->location->address . ', ' . $property->location->city . ',' . $property->location->pincode,
                'price' => '₹' . ' ' . $property->property_price,
                'bedrooms' => $property->bedrooms ?? null,
                'bathrooms' => $property->bathrooms ?? null,
                'area' => $property->plot_area . ' ' . $property->plot_area_unit ?? 'N/A',
                'image' => ($property->firstImage && $property->firstImage->image)
                    ? asset($property->firstImage->image)
                    : asset('image/temp/1749454227_independent_house.jpg'),


                'type' => class_basename($property),  // ResidentialProperty, CommercialProperty, etc.
            ];
        });

        return response()->json($formatted);
    }
}
