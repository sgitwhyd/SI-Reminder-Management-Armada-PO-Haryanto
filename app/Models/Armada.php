<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Armada extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function perawatans()
    {
        return $this->hasMany(Perawatan::class);
    }
}
