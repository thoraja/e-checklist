<?php

namespace App\Models\ChecklistModels\Harian;

use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistModels\Harian\Poin;

class Kategori extends Model
{
    protected $table = 'harian_kategori';
    public $timestamps = false;

    public function poin()
    {
        return $this->hasMany(Poin::class, 'harian_kategori_id');
    }
}
