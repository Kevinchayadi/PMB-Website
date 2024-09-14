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
        Schema::create('relation_transaction_seksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaction');
            $table->foreign('id_transaction')->references('id_transaction')->on('transaction_headers');
            $table->unsignedBigInteger('id_seksi');
            $table->foreign('id_seksi')->references('id_seksi')->on('seksis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relation_transaction_seksis');
    }
};
