<?php

namespace App\Models\ChecklistModels\Mingguan;

use Illuminate\Database\Eloquent\Model;

use App\Models\MobilTangki;
use App\Models\Auth\User;
use App\Models\ChecklistModels\Mingguan\Poin;

class Checklist extends Model
{
    protected $table = 'mingguan_checklist';

    public function mobil_tangki()
    {
        return $this->belongsTo(MobilTangki::class, 'mobil_tangki_id');
    }

    public function poin()
    {
        return $this->belongsToMany(Poin::class, 'mingguan_checklist_poin', 'mingguan_checklist_id', 'mingguan_poin_id')
                      ->withPivot('kondisi', 'bukti')
                      ->withTimestamps();
    }
}
