<?php

namespace App\Http\Controllers\Checklist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChecklistModels\Bulanan\Kategori;
use App\Models\ChecklistModels\Bulanan\Checklist;
use App\Models\ChecklistModels\Bulanan\SubKategori;

class BulananChecklistController extends Controller
{
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
        return view('checklist.bulanan.create', $data);
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
        $checklist->nama_supervisor = $request->nama['supervisor'];
        $checklist->nama_mekanik = $request->nama['mekanik'];
        $checklist->save();

        foreach($request->poin as $subkategori_id => $poin_item) {
            foreach($poin_item as $poin_id => $hasil) {
                $checklist->poin()->attach($poin_id, ['hasil' => $hasil]);
            }
        }

        $request->session()->forget('granted_access.mobil_tangki');

        return redirect()->route('front_page');
    }
}
