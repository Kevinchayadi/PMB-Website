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
            $table->string('judul');
            $table->unsignedBigInteger('id_romo');
            $table->unsignedBigInteger('id_seksi');
            $table->unsignedBigInteger('id_doa')->nullable();
            $table->date('jadwal_transaction');
            $table->string('status')->default('soon');
            $table->softDeletes();
            $table->timestamps();
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
