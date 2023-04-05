<?php

namespace App\Models\ChecklistModels\Harian;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Harian\Kategori;
use App\Models\ChecklistModels\Harian\Checklist;

class Poin extends Model
{
    protected $table = 'harian_poin';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'harian_kategori_id');
    }

    public function checklist()
    {
        return $this->belongsToMany(Checklist::class, 'harian_checklist_poin', 'harian_poin_id', 'harian_checklist_id')
                      ->withPivot('kondisi', 'bukti')
                      ->withTimestamps();
    }
}
