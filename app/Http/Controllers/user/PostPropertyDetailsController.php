<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostPropertyDetailsController extends Controller
{
    public function postpropertydetails(){
        return view('landing_page/postproperty/postpropertydetails');
    }
}
