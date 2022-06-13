<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function welcome_ar()
    {
        return view("welcome-ar");
    }
    public function welcome_en()
    {
        return view("welcome-en");
    }
}
