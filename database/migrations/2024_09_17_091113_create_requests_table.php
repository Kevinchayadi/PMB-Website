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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara');
            $table->unsignedBigInteger('id_umat');
            $table->string('nama_terlibat_satu');
            $table->string('nama_terlibat_dua')->nullable();
            $table->string('nama_romo')->nullable();
            $table->date('jadwal acara')->nullable();
            $table->text('deskripsi_pengajuan')->nullable();
            $table->string('status')->default('pending');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_umat')->references('id_umat')->on('umats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['id_umats']);
        });

        Schema::dropIfExists('requests');
    }
};
