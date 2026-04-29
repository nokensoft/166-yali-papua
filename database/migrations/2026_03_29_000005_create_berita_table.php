<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->nullable()->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('sumber_nama')->nullable();
            $table->string('sumber_link')->nullable();
            $table->foreignId('kategori_berita_id')->nullable()->constrained('kategori_berita')->nullOnDelete();
            $table->foreignId('media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->string('gambar_url')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['draft', 'terbit'])->default('draft');
            $table->date('tanggal_terbit')->nullable();
            $table->unsignedInteger('jumlah_dibaca')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
