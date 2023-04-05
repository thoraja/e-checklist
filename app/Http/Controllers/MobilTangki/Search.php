<?php

namespace App\Http\Controllers\MobilTangki;

use App\Models\MobilTangki;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Search extends Controller
{
    public function __invoke(Request $request)
    {
        $mobil_tangki = MobilTangki::where('nomor_polisi', $request->nomor_polisi)->first();
        if ($mobil_tangki) {
            $data['isFound'] = true;
            $data['mobilTangkiId'] = $mobil_tangki->id;
        } else {
            $data['isFound'] = false;
        }
        return response()->json($data);
    }
}
