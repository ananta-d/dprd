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
        Schema::create('tanggapans', function (Blueprint $table) {
        $table->id();
        $table->text('tanggapan');
        $table->date('tgl_tanggapan');
        $table->string ('dokumentasi');
        $table->unsignedBigInteger('complaint_id');
        $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapans');
    }
};
