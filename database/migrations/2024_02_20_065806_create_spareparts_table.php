<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sparepart', 100);
            $table->string('nama_sparepart', 100);
            $table->integer('harga')->length(11)->unsigned();
            $table->integer('stock')->length(11)->unsigned();
            $table->enum('status', ['READY','KOSONG'])->default('READY');
            $table->text('keterangan', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
};
