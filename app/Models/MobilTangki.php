<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ChecklistModels\Harian\Checklist as ChecklistHarian;
use App\Models\ChecklistModels\Bulanan\Checklist as ChecklistBulanan;
use App\Models\ChecklistModels\Mingguan\Checklist as ChecklistMingguan;

class MobilTangki extends Model
{
    use HasFactory;
    protected $table = 'mobil_tangki';
    protected $fillable = [
      'nomor_polisi'
    ];
    public $timestamps = false;

    public function requestAccess($password)
    {
        return Hash::check($password, $this->password);
    }

    public function harian_checklist()
    {
        return $this->hasMany(ChecklistHarian::class, 'mobil_tangki_id');
    }

    public function mingguan_checklist()
    {
        return $this->hasMany(ChecklistMingguan::class, 'mobil_tangki_id');
    }

    public function bulanan_checklist()
    {
        return $this->hasMany(ChecklistBulanan::class, 'mobil_tangki_id');
    }
}
