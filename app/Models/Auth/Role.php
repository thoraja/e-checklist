<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Auth\User;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nama'];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
