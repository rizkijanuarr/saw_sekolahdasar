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

        Schema::create('asessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->references('id')->on('sekolahs')->cascadeOnDelete();
            $table->foreignId('kriteria_id')->references('id')->on('kriterias')->cascadeOnDelete();
            $table->foreignId('sub_kriteria_id')->references('id')->on('sub_kriterias')->cascadeOnDelete();
            $table->decimal('skor', 5, 2)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asessments');
    }
};
