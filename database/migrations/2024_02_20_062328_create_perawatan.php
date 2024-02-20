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
        Schema::create('perawatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_armada');
            $table->date('tanggal');
            $table->string('oli_gardan');
            $table->string('oli_mesin');
            $table->string('oli_transmisi');
            $table->enum('status', [
                'selesai',
                'menunggu konfirmasi kepala gudang'
            ]);

            $table->timestamps();
            $table->foreign('id_armada')->references('id')->on('armadas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatans');
    }
};