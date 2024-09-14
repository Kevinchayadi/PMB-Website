<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('umats', function (Blueprint $table) {
            $table->id("id_umat");
            $table->string('nama_umat', 255);
            $table->string('slug', 255)->nullable()->unique();
            $table->string('Wilayah', 225);
            $table->string('lingkungan', 100)->nullable();
            $table->string('nomor_hp_umat', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->string('status', 100);
            $table->string('Pekerjaan', 100)->nullable();
            $table->string('created_by', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umats');
    }
};
