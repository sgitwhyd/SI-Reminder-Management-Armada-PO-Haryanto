<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rampcheck extends Model
{
    use HasFactory;
    protected $table = 'rampchecks';
    protected $primaryKey = 'id_rampcheck';
    protected $guarded = [];
}
