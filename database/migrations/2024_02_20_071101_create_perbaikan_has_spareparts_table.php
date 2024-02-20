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
        Schema::create('perbaikan_has_spareparts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perbaikan_id');
            $table->unsignedBigInteger('sparepart_id');
            $table->timestamps();

            $table->foreign('perbaikan_id')->references('id')->on('perbaikans')->onDelete('cascade');
            $table->foreign('sparepart_id')->references('id')->on('spareparts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikan_has_spareparts');
    }
};
