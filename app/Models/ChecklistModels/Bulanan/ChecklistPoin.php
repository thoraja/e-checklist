<?php

namespace App\Models\ChecklistModels\Bulanan;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\ChecklistModels\Bulanan\JenisPengecekan;

class ChecklistPoin extends Pivot
{
    public function jenis_pengecekan()
    {
        return $this->belongsTo(JenisPengecekan::class, 'bulanan_jenis_pengecekan_id');
    }
}
