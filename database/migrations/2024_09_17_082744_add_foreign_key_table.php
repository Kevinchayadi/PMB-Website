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
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('id_role')->references('id_role')->on('admin_roles')->onDelete('cascade');
        });
        
        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->foreign('id_romo')->references('id_romo')->on('romos')->onDelete('cascade');
            $table->foreign('id_seksi')->references('id_seksi')->on('seksis')->onDelete('cascade');
            $table->foreign('id_doa')->references('id_doa')->on('doas')->onDelete('cascade');
        });

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('id_transaction')->references('id_transaction')->on('transaction_headers')->onDelete('cascade');
            $table->foreign('id_acara')->references('id_acara')->on('acaras')->onDelete('cascade');
            $table->foreign('id_umat')->references('id_umat')->on('umats')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('cascade');
        
        });

        Schema::table('relation_transaction_seksis', function (Blueprint $table) {
            $table->foreign('id_transaction')->references('id_transaction')->on('transaction_headers')->onDelete('restrict');
            $table->foreign('id_seksi')->references('id_seksi')->on('seksis')->onDelete('restrict');
        });

        Schema::table('relation_transaction_umats', function (Blueprint $table) {
            $table->foreign('id_transaction')->references('id')->on('transaction_details')->onDelete('restrict');
            $table->foreign('id_umat')->references('id_umat')->on('umats')->onDelete('restrict');
        });

        // Schema::table('doas', function (Blueprint $table) {
        //     $table->foreign('id_doa')->references('id_doa')->on('transaction_headers')->onDelete('cascade');
            
        // });

        Schema::table('documentations', function (Blueprint $table) {
            $table->foreign('id_acara')->references('id_acara')->on('acaras')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentations', function (Blueprint $table) {
            $table->dropForeign(['id_acara']);
        });
    
       
        Schema::table('relation_transaction_umats', function (Blueprint $table) {
            $table->dropForeign(['id_transaction']);
            $table->dropForeign(['id_umat']);
        });
    
        
        Schema::table('relation_transaction_seksis', function (Blueprint $table) {
            $table->dropForeign(['id_transaction']);
            $table->dropForeign(['id_seksi']);
        });
    
       
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign(['id_transaction']);
            $table->dropForeign(['id_acara']);
            $table->dropForeign(['id_umat']);
            $table->dropForeign(['id_admin']);
        });
    
       
        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->dropForeign(['id_romo']);
            $table->dropForeign(['id_seksi']);
            $table->dropForeign(['id_doa']);
        });
    
        
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['id_role']);
        });
    }
};
