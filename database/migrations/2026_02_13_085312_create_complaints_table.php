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
    Schema::create('complaints', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('isi_laporan');
        $table->string('foto')->nullable();
        $table->text('lokasi_kejadian');
        $table->enum('status', ['pending', 'proses', 'selesai', 'ditolak'])->default('pending');
         $table->unsignedBigInteger ('masyarakat_id');
            $table->foreign('masyarakat_id')->references('id')->on('masyarakats')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
