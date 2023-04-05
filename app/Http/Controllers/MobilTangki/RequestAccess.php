<?php

namespace App\Http\Controllers\MobilTangki;

use App\Http\Controllers\Controller;
use App\Models\MobilTangki;
use Illuminate\Http\Request;

class RequestAccess extends Controller
{
    public function __invoke(Request $request) {
        $mobil_tangki = MobilTangki::where('nomor_polisi', $request->nomor_polisi)->first();

        if ($mobil_tangki->requestAccess($request->password)) {
            $request->session()->put('granted_access.mobil_tangki', $mobil_tangki);
            $data = [
                'status' => 'granted',
                'message' => 'Access granted for ' . $mobil_tangki->nomor_polisi,
            ];
            return response()->json($data);
        } else {
            $data = [
                'status' => 'rejected',
                'message' => 'These credentials do not match our records'
            ];
            return response()->json($data);
        }
    }
}
