<?php

namespace App\Http\Controllers\Checklist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MobilTangki;

class ChecklistController extends Controller
{
    public function index()
    {
        $mobil_tangki = MobilTangki::all();

        $data = [
            'mobil_tangki' => $mobil_tangki,
        ];
        return view('checklist.index', $data);
    }

    public function show(Request $request)
    {
        $mobil_tangki = MobilTangki::find($request->id);

        $data = [
            'mobil_tangki' => $mobil_tangki,
        ];
        return view('checklist.show', $data);
    }
}
