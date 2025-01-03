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
            $table->string('nama_romo', 255);
            $table->string('slug', 255)->nullable()->unique();
            $table->date('DOB_romo')->nullable();
            $table->string('tempat_lahir', 255)->nullable();
            $table->string('jabatan', 255)->nullable();
            $table->text('Pengalaman')->nullable();
            $table->string('nomorhp_romo', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('path');
            $table->rememberToken();
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
