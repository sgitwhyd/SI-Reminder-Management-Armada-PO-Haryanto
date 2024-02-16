<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_armada', function (Blueprint $table) {
            $table->bigIncrements('id_armada');
            $table->string('no_polisi',20);
            $table->string('no_lambung',100);
            $table->string('no_stnk',100);
            $table->integer('tahun')->length(5)->unsigned();
            $table->string('trayek', 100);
            $table->enum('jenis_trayek', ['AKAP','AKDP','PARIWISATA','MPU'])->default('AKAP');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_armada');
    }
};
