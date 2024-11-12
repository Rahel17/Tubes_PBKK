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
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deksripsi')->nullable();
            $table->foreignId('pemateri_id')->constrained()->onDelete('cascade');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->decimal('biaya', 15, 2);
            $table->enum('status', ['akan_datang', 'selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};
