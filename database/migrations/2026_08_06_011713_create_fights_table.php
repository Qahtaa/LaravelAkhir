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
        Schema::create('fights', function (Blueprint $table) {
        $table->id();
        $table->string('red_corner');     // Nama Petarung Sudut Merah
        $table->string('blue_corner');    // Nama Petarung Sudut Biru
        $table->string('weight_class');   // Misal: Lightweight, Welterweight, Catchweight
        $table->dateTime('match_time');   // Tanggal & Jam Pertandingan
        $table->string('status')->default('Upcoming'); // Upcoming, Live, Finished
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fights');
    }
};
