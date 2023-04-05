<?php

namespace App\Models\ChecklistModels\Mingguan;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Mingguan\SubKategori;

class Kategori extends Model
{
    protected $table = 'mingguan_kategori';
    public $timestamps = false;

    public function sub_kategori()
    {
        return $this->hasMany(SubKategori::class, 'mingguan_kategori_id');
    }
}
