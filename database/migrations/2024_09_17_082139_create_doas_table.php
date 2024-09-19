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
        Schema::create('doas', function (Blueprint $table) {
            $table->id('id_doa');
            $table->string('nama_doa', 255)->nullable()->default('text');
            $table->text('deskripsi_doa');
            $table->string('ayat_renungan', 255)->nullable()->default('text');
            $table->text('isi_renungan');
            $table->string('ayat_tambahan', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doas');
    }
};
