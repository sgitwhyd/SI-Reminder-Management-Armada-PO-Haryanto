<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_sparepart extends Model
{
    use HasFactory;

    protected $table = 'master_sparepart';
    protected $primaryKey = 'id_sp';
    protected $fillable = ['no_sp', 'nama_sp', 'stock', 'status'];

    public static function get_enum_values( $table, $field )
    {
        $type = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )[0]->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}
