<?php

namespace App\Models\ChecklistModels\Bulanan;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Bulanan\Poin;
use App\Models\ChecklistModels\Bulanan\Kategori;

class SubKategori extends Model
{
    protected $table = 'bulanan_sub_kategori';
    public $timestamps = false;

    public function poin()
    {
        return $this->hasMany(Poin::class, 'bulanan_sub_kategori_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'bulanan_kategori_id');
    }
}
