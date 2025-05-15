<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
   public function property_index(){
    return view('Properties.properties');
   }
   public function property_create(){
    return view('Properties.property-create');
   }
   
}