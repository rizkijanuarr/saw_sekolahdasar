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
        Schema::disableForeignKeyConstraints();

        Schema::create('normalisasi_asessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->cascadeOnDelete();
            $table->foreignId('kriteria_id')->nullable()->constrained('kriterias')->cascadeOnDelete();
            $table->foreignId('sub_kriteria_id')->nullable()->constrained('sub_kriterias')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normalisasi_asessments');
    }
};
