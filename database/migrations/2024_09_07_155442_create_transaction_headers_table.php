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
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id('id_transaction');
            $table->unsignedBigInteger('id_romo');
            $table->unsignedBigInteger('id_seksi');
            $table->date('Jadwal Acara');
            $table->string('status')->default('soon');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_romo')->references('id_romo')->on('romos');
            $table->foreign('id_seksi')->references('id_seksi')->on('seksis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_headers');
    }
};
