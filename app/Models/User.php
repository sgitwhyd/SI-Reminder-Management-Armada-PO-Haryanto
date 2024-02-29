<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username','password', 'full_name', 'role', 'id_armada'];
    // protected $guarded = ['id'];

    public function rampchecks()
    {
        return $this->hasMany(Rampcheck::class, 'user_id', 'id');
    }
}
