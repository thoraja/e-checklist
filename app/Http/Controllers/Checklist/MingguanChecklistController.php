<?php

namespace App\Http\Controllers\Checklist;

use App\Models\MobilTangki;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ChecklistModels\Mingguan\Kategori;
use App\Models\ChecklistModels\Mingguan\Checklist;
use App\Models\ChecklistModels\Mingguan\SubKategori;

class MingguanChecklistController extends Controller
{
    public function index()
    {
        return view('checklist.mingguan.index');
    }

    public function create(Request $request)
    {
        if (!$request->session()->has('granted_access.mobil_tangki')) {
            return redirect()->route('front_page');
        }

        $mobil_tangki = $request->session()->get('granted_access.mobil_tangki');
        $kategori = Kategori::all();

        $data = [
            'mobil_tangki' => $mobil_tangki,
            'kategori' => $kategori,
        ];
        return view('checklist.mingguan.create', $data);
    }

    public function store(Request $request)
    {
        if (!$request->session()->has('granted_access.mobil_tangki')) {
            return redirect()->route('front_page');
        }

        $subkategori = SubKategori::all();
        $rules =
        [
            'nama.*' => 'required',
            'km_odo' => 'required|numeric',
            'poin' => 'required|array|min:' . $subkategori->count(),
        ];
        foreach ($subkategori as $subkategori_item) {
            $rules['poin.' . $subkategori_item->id] = 'required|array|min:' . $subkategori_item->poin->count();
            foreach ($subkategori_item->poin as $poin_item) {
                $rules['poin.' . $subkategori_item->id . '.' . $poin_item->id] = 'required|in:1,0';
            }
        }
        $request->validate($rules);

        $mobil_tangki = $request->session()->get('granted_access.mobil_tangki');
        $checklist = new Checklist;
        $checklist->mobil_tangki_id = $mobil_tangki->id;
        $checklist->tanggal = now();
        $checklist->km_odo = $request->km_odo;
        $checklist->nama_amt = $request->nama['amt'];
        $checklist->nama_mekanik = $request->nama['mekanik'];
        $checklist->save();

        foreach($request->poin as $subkategori_id => $poin_item) {
            foreach($poin_item as $poin_id => $kondisi) {
                $checklist->poin()->attach($poin_id, ['kondisi' => $kondisi]);
            }
        }

        $request->session()->forget('granted_access.mobil_tangki');

        return redirect()->route('front_page');
    }

    public function show($mobil_tangki_id)
    {
        $mobil_tangki = MobilTangki::find($mobil_tangki_id);
        $mingguan_checklist = $mobil_tangki->mingguan_checklist->groupBy('tanggal');

        $data = [
            'mobil_tangki' => $mobil_tangki,
            'mingguan_checklist' => $mingguan_checklist,
        ];
        return view('checklist.mingguan.show', $data);
    }

    public function confirm(Request $request)
    {
        return "works";
    }
}
