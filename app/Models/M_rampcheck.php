<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_rampcheck extends Model
{
    use HasFactory;
    protected $table = 'rampcheck';
    protected $primaryKey = 'id_rampcheck';
    protected $guarded = [];
}
