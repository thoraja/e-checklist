<?php

namespace App\Models\ChecklistModels\Bulanan;

use Illuminate\Database\Eloquent\Model;

use App\Models\MobilTangki;
use App\Models\Auth\User;
use App\Models\ChecklistModels\Bulanan\Poin;
use App\Models\ChecklistModels\Bulanan\ChecklistPoin;

class Checklist extends Model
{
    protected $table = 'bulanan_checklist';

    public function mobil_tangki()
    {
        return $this->belongsTo(MobilTangki::class, 'mobil_tangki_id');
    }

    public function poin()
    {
        return $this->belongsToMany(Poin::class, 'bulanan_checklist_poin', 'bulanan_checklist_id', 'bulanan_poin_id')
                      ->using(ChecklistPoin::class)
                      ->withPivot('criticality', 'hasil', 'detail_perbaikan', 'waktu_rencana_perbaikan', 'pemesanan_part', 'bukti')
                      ->withTimestamps();
    }
}
