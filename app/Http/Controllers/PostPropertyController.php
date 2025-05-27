<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostPropertyController extends Controller
{
    public function postproperty()
    {

        $ResidentialProperty = DB::table('property_types')->where('property_category_id', 1)->get();
        $CommercialProperty = DB::table('property_types')->where('property_category_id', 2)->get();
        // dd($ResidentialProperty);
        return view('landing_page/postproperty/postproperty', compact('ResidentialProperty', 'CommercialProperty'));
    }
}
