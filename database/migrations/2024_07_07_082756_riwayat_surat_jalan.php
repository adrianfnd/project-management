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
        Schema::create('riwayat_surat_jalan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_jalan_id');
            $table->foreign('surat_jalan_id')->references('id')->on('surat_jalan')->onDelete('cascade');
            $table->unsignedBigInteger('ftth_project_id');
            $table->foreign('ftth_project_id')->references('id')->on('ftth_projects')->onDelete('cascade');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->unsignedBigInteger('technician_id');
            $table->foreign('technician_id')->references('id')->on('users');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_surat_jalan');
    }
};
