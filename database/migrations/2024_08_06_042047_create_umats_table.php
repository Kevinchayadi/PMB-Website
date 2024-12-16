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
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->string('google_refresh_token')->nullable();
            $table->string('nama_umat', 255);
            $table->string('nama_baptis', 255);
            $table->string('slug', 255)->nullable()->unique();
            $table->string('email_umat')->unique();
            $table->string('password');
            $table->string('ttl_uamt',255)->nullable();
            $table->string('Wilayah', 225)->nullable();
            $table->string('lingkungan', 100)->nullable();
            $table->string('nomorhp_umat', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->string('status', 100)->nullable();
            $table->string('Pekerjaan', 100)->nullable();
            $table->string('created_by', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('umats');
    }
};
