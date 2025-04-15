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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('label_rack')->nullable();
            $table->string('no_fisik_rack')->nullable();
            $table->string('kota')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_customer')->nullable();
            $table->string('jumlah_layanan')->nullable();
            $table->string('jenis_layanan')->nullable();
            $table->string('sales_channel')->nullable();
            $table->string('status_bisnis')->nullable();
            $table->string('status_layanan')->nullable();
            $table->string('no_order')->nullable();
            $table->string('dokumen_pendukung')->nullable();
            $table->date('tanggal_aktivasi')->nullable();
            $table->string('power_source')->nullable();
            $table->string('power_rack')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('nama_switch_otb')->nullable();
            $table->string('vlan')->nullable();
            $table->string('port')->nullable();
            $table->string('others')->nullable();
            $table->string('am_telkom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
