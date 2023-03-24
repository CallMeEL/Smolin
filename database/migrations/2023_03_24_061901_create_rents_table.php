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
        Schema::create('rents', function (Blueprint $table) {
            $table->id('id_motor');
            $table->string('nama_motor');
            $table->string('tipe_motor');
            $table->bigInteger('harga');
            $table->string('gambar');
            $table->boolean('status_sewa')->default(false);
            $table->date('tanggal_sewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
