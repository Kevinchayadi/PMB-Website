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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('slug')->nullable(); 
            $table->text('description'); 
            $table->string('location'); 
            $table->string('path'); 
            $table->date('date'); 
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('documentations', function (Blueprint $table) {
            $table->foreign('id_kegiatan')->references('id')->on('kegiatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
