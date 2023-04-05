<?php

namespace App\Http\Controllers;

use App\Models\MobilTangki;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function showFrontPage()
    {
        return view('front_page');
    }

    public function showChecklistOptionsPage()
    {
        return view('checklist.option');
    }
}
