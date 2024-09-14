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
        Schema::create('romos', function (Blueprint $table) {
            $table->id("id_romo");
            $table->string('nama_romo', 100);
            $table->string('slug', 100)->nullable()->unique();
            $table->string('ttl_romo', 100);
            $table->string('nomor_hp_romo', 100);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('romos');
    }
};
