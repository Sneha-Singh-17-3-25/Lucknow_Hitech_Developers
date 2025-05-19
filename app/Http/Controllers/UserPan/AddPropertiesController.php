<?php

namespace App\Http\Controllers\AgentPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddPropertiesController extends Controller
{
    public function addProperties()
    {
        return view('AgentPanel/addProperties');
    }
}
