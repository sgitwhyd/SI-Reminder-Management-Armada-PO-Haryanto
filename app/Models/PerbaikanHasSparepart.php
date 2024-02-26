<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbaikanHasSparepart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }

    public function perbaikan()
    {
        return $this->belongsTo(Perbaikan::class, 'perbaikan_id');
    }
}
