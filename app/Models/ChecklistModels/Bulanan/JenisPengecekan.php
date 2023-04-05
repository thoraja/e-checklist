<?php

namespace App\Models\ChecklistModels\Bulanan;

use Illuminate\Database\Eloquent\Model;

class JenisPengecekan extends Model
{
    protected $table = 'bulanan_jenis_pengecekan';
    public $timestamps = false;

    public function poin()
    {
      return $this->belongsToMany(Poin::class, 'bulanan_poin_jenis_pengecekan', 'bulanan_jenis_pengecekan_id', 'bulanan_poin_id');
    }
}
