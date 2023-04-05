<?php

namespace App\Models\ChecklistModels\Harian;

use App\Models\Auth\User;

use App\Models\MobilTangki;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChecklistModels\Harian\Poin;

class Checklist extends Model
{
    protected $table = 'harian_checklist';

    public function mobil_tangki()
    {
        return $this->belongsTo(MobilTangki::class, 'mobil_tangki_id');
    }

    public function pengawas_amt()
    {
        return $this->belongsTo(User::class, 'pengawas_amt_id');
    }

    public function hsse()
    {
        return $this->belongsTo(User::class, 'hsse_id');
    }

    public function confirmPengawas()
    {
        $this->pengawas_amt_id = Auth::user()->id;
        $this->save();
        return $this->pengawas_amt_id;
    }

    public function poin()
    {
        return $this->belongsToMany(Poin::class, 'harian_checklist_poin', 'harian_checklist_id', 'harian_poin_id')
                      ->withPivot('kondisi', 'bukti')
                      ->withTimestamps();
    }
}
