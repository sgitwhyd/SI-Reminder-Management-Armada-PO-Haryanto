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

    public function armada()
    {
        return $this->belongsTo(Armada::class, 'id_armada');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
