<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sparepart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function perbaikans()
    {
        return $this->belongsToMany(Perbaikan::class, 'perbaikan_has_spareparts', 'sparepart_id', 'perbaikan_id')->withPivot('createdAt', 'updatedAt');
    }
}
