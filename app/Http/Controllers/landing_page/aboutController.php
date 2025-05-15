<?php

namespace App\Http\Controllers\landing_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function landing_about()
    {
        return view('landing_page/about');
    }

    public function landing_contact()
    {
        return view('landing_page/contact');
    }

    public function landing_agents()
    {
        return view('landing_page/agents');
    }
}