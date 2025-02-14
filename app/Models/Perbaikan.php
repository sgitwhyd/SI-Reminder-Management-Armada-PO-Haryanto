<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function armada()
    {
        return $this->belongsTo(Armada::class, 'id_armada');
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'perbaikan_has_spareparts', 'perbaikan_id', 'sparepart_id')->withPivot('created_at', 'updated_at');
    }

    public function sparepart()
    {
        return $this->hasMany(PerbaikanHasSparepart::class, 'perbaikan_id');
    }
}
