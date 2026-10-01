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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_skema')->constrained('skema')->onDelete('cascade');
            $table->string('kd_peserta', 20)->unique();
            $table->string('nm_peserta', 100);
            $table->enum('jk', ['L', 'P']);
            $table->text('alamat');
            $table->string('no_hp', 20);    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
