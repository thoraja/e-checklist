<?php

namespace App\Http\Controllers\Checklist;

use Carbon\Carbon;
use App\Models\MobilTangki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ChecklistModels\Harian\Kategori;
use App\Models\ChecklistModels\Harian\Checklist;

class HarianChecklistController extends Controller
{

    public function index()
    {
        return view('checklist.harian.index');
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
        return view('checklist.harian.create', $data);
    }

    public function store(Request $request)
    {
        if (!$request->session()->has('granted_access.mobil_tangki')) {
            return redirect()->route('front_page');
        }
        $kategori = Kategori::all();
        $rules =
        [
            'nama_amt' => 'required',
            'poin' => 'required|array|min:' . $kategori->count(),
            'catatan' => 'required',
        ];
        foreach ($kategori as $kategori_item) {
            $rules['poin.' . $kategori_item->id] = 'required|array|min:' . $kategori_item->poin->count();
            foreach ($kategori_item->poin as $poin_item) {
                $rules['poin.' . $kategori_item->id . '.' . $poin_item->id] = 'required|in:1,0';
            }
        }
        $rules['poin.3.29'] = 'required|numeric';
        $rules['poin.3.30'] = 'required|numeric';
        $request->validate($rules);

        $mobil_tangki = $request->session()->get('granted_access.mobil_tangki');
        $checklist = new Checklist;
        $checklist->mobil_tangki_id = $mobil_tangki->id;
        $checklist->tanggal = now();
        $checklist->rit = $mobil_tangki->harian_checklist()->whereDate('tanggal', now())->count() + 1;
        $checklist->catatan = $request->catatan;
        $checklist->nama_amt = $request->nama_amt;
        $checklist->save();

        foreach($request->poin as $kategori_id => $poin) {
            foreach($poin as $poin_id => $value) {
                $checklist->poin()->attach($poin_id, ['kondisi' => $value]);
            }
        }

        $request->session()->forget('granted_access.mobil_tangki');

        return redirect()->route('front_page');
    }

    public function show(Request $request, $mobil_tangki_id)
    {
        $mobil_tangki = MobilTangki::find($mobil_tangki_id);
        $bulan = $request->bulan ? $request->bulan : now()->month;
        $tahun = $request->tahun ? $request->tahun : now()->year;

        $harian_checklist = $mobil_tangki->harian_checklist()
            ->whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->get()
            ->groupBy('tanggal');

        $filter = null;
        for ($i=1; $i < 13; $i++) {
            $filter['bulan'][$i] = Carbon::create()->day(1)->month($i)->isoFormat('MMMM');
        }
        foreach ($mobil_tangki->harian_checklist()->select(DB::raw('distinct year(`tanggal`) as tahun'))->get() as $i => $tahun_filter) {
            $filter['tahun'][$i + 1] = $tahun_filter->tahun;
        }

        $data = [
            'mobil_tangki' => $mobil_tangki,
            'harian_checklist' => $harian_checklist,
            'filter' => $filter,
        ];
        return view('checklist.harian.show', $data);
    }

    public function details($checklist_id)
    {
        $harian_checklist_poin = Checklist::find($checklist_id)->poin->groupBy('kategori.nama');

        $data = [
            'harian_checklist_poin' => $harian_checklist_poin,
        ];
        return view('checklist.harian.details', $data);
    }

    public function confirm(Request $request, $harian_checklist_id)
    {
        if (Auth::user()->is_pamt) {
            $checklist = Checklist::find($harian_checklist_id);
            $checklist->confirmPengawas();
        } elseif (Auth::user()->is_hsse) {
            $checklist = Checklist::find($harian_checklist_id);
            $checklist->confirmHSSE();
        }
        return redirect()->back();
    }

    public function summary(Request $request)
    {
        $tanggal = $request->tanggal ? $request->tanggal : now();

        $checklist = Checklist::whereDate('tanggal', $tanggal)->get();

        $data = [
            'checklist' => $checklist,
        ];
        return view('checklist.harian.summary', $data);
    }
}
