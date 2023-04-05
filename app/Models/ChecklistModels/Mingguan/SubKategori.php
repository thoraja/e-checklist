<?php

namespace App\Models\ChecklistModels\Mingguan;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Mingguan\Poin;
use App\Models\ChecklistModels\Mingguan\Kategori;

class SubKategori extends Model
{
    protected $table = 'mingguan_sub_kategori';
    public $timestamps = false;

    public function poin()
    {
        return $this->hasMany(Poin::class, 'mingguan_sub_kategori_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'mingguan_kategori_id');
    }
}
