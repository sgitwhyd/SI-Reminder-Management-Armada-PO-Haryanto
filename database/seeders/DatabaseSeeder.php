<?php

namespace Database\Seeders;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use App\Models\PerbaikanHasSparepart;
use App\Models\Sparepart;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Users::class,

        ]);

        Armada::factory()->count(10)->create();
        Perawatan::factory()->count(10)->create();
        Sparepart::factory()->count(10)->create();
        Perbaikan::factory()->count(10)->create();
        PerbaikanHasSparepart::factory()->count(10)->create();

        
    }
}
