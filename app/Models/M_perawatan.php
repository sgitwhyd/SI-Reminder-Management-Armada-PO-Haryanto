<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_perawatan extends Model
{
    use HasFactory;
    protected $table = 'perawatan';
    protected $primaryKey = 'id_perawatan';
    protected $fillable = ['tgl_perawatan', 'lokasi'];
    public static function get_enum_values( $table, $field ) {
        $type = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )[0]->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}
