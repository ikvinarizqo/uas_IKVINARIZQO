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
        Schema::create('kotas', function (Blueprint $table) {
            $table->id();
            $table->String ('Nama_Kota' ,15);
            $table->String ('Nama_Pemimpin' ,20);
            $table->Date ('Tgl_Berdiri');
            $table->Int ('jumlah_penduduk' ,10);
            $table->Float ('Luas_Wilayah' ,10);
            $table->String ('Jenis Kota', 15);
            $table->Text ('Keunggulan'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kotas');
    }
};
