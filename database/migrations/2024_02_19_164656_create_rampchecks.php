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
        Schema::create('rampchecks', function (Blueprint $table) {
            $table->bigIncrements('id_rampcheck');
            $table->integer('user_id');
            $table->string('checker',50);
            $table->string('tgl_rampcheck',50);
            $table->string('waktu_rampcheck',50);
            $table->string('no_polisi',50);
            $table->string('no_lambung',50);
            $table->string('posisi_kilometer',50);
            $table->string('posisi_bbm',50);
            $table->string('panel_led_dalam',50);
            $table->string('lampu_kabin',50);
            $table->string('klakson',50);
            $table->string('konektor_pintu_hidrolik',50);
            $table->string('handgrip',50);
            $table->string('tempat_sampah',50);
            $table->string('apar',50);
            $table->string('palu_darurat',50);
            $table->string('pjk',50);
            $table->string('ban',50);
            $table->string('ac',50);
            $table->string('panel_led_luar',50);
            $table->string('lampu_utama',50);
            $table->string('lampu_sein',50);
            $table->string('lampu_senja',50);
            $table->string('wiper_washer',50);
            $table->string('spion',50);
            $table->string('lampu_mundur',50);
            $table->string('lampu_rem',50);
            $table->string('lampu_plat_nopol',50);
            $table->string('dongkrak',50);
            $table->string('pembuka_roda',50);
            $table->string('segitiga_pengaman',50);
            $table->string('ban_cadangan',50);
            $table->string('catatan_rampcheck',100)->nullable();
            $table->string('status_check',100);
            $table->string('ttd_checker',255);
            $table->string('ttd_kepala_gudang',255)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rampchecks');
    }
};
