<?php

namespace App\Models\ChecklistModels\Bulanan;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Bulanan\SubKategori;

class Kategori extends Model
{
    protected $table = 'bulanan_kategori';
    public $timestamps = false;

    public function sub_kategori()
    {
        return $this->hasMany(SubKategori::class, 'bulanan_kategori_id');
    }
}
