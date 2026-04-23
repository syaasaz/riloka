<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // foreign key ke users
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('kategori');
            $table->string('merek');
            $table->string('ukuran');
            $table->string('lokasi');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};