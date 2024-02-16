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
        Schema::create('master_sparepart', function (Blueprint $table) {
            $table->bigIncrements('id_sp');
            $table->string('no_sp', 100);
            $table->string('nama_sp', 255);
            $table->integer('stock')->length(11)->unsigned();
            $table->enum('status', ['READY','KOSONG'])->default('READY');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_sparepart');
    }
};
