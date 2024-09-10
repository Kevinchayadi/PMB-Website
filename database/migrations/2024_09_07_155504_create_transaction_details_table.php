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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaction');
            $table->unsignedBigInteger('id_acara');
            $table->unsignedBigInteger('id_umat');
            $table->unsignedBigInteger('id_admin');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_transaction')->references('id_transaction')->on('transaction_headers');
            $table->foreign('id_acara')->references('id_acara')->on('acaras');
            $table->foreign('id_umat')->references('id_umat')->on('umats');
            $table->foreign('id_admin')->references('id_admin')->on('admins');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
