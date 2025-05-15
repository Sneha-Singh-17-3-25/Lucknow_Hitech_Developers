<?php

namespace App\Http\Controllers\landing_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
   public function landing_index(){
    return view('landing_page.index');
   }
}