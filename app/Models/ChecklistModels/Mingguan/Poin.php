<?php

namespace App\Models\ChecklistModels\Mingguan;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Mingguan\SubKategori;
use App\Models\ChecklistModels\Mingguan\Checklist;

class Poin extends Model
{
    protected $table = 'mingguan_poin';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(SubKategori::class, 'mingguan_sub_kategori_id');
    }

    public function checklist()
    {
      return $this->belongsToMany(Checklist::class, 'mingguan_checklist_poin', 'mingguan_poin_id', 'mingguan_checklist_id')
                    ->withPivot('kondisi', 'keterangan', 'bukti')
                    ->withTimestamps();
    }
}
