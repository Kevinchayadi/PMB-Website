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
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara', 100);
            $table->date('Jadwal Acara');
            $table->date('created_at')->nullable()->default(new DateTime());
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
