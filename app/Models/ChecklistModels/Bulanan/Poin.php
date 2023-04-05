<?php

namespace App\Models\ChecklistModels\Bulanan;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Bulanan\Checklist;
use App\Models\ChecklistModels\Bulanan\SubKategori;
use App\Models\ChecklistModels\Bulanan\JenisPengecekan;

class Poin extends Model
{
    protected $table = 'bulanan_poin';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(SubKategori::class, 'bulanan_sub_kategori_id');
    }

    public function jenis_pengecekan()
    {
        return $this->belongsToMany(JenisPengecekan::class, 'bulanan_poin_jenis_pengecekan', 'bulanan_poin_id', 'bulanan_jenis_pengecekan_id');
    }

    public function checklist()
    {
      return $this->belongsToMany(Checklist::class, 'bulanan_checklist_poin', 'bulanan_poin_id', 'bulanan_checklist_id')
                    ->using(ChecklistPoin::class)
                    ->withPivot('criticality', 'hasil', 'detail_perbaikan', 'waktu_rencana_perbaikan', 'pemesanan_part', 'bukti')
                    ->withTimestamps();
    }
}
