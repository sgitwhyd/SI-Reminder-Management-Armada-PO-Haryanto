<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_armada extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'master_armada';
    protected $primaryKey = 'id_armada';
    protected $fillable = ['no_polisi', 'no_lambung', 'no_stnk', 'tahun', 'trayek', 'jenis_trayek'];

    public static function get_enum_values( $table, $field )
    {
        $type = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )[0]->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}