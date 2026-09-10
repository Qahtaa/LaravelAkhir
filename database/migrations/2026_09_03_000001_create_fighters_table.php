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
        Schema::create('fighters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedInteger('record_win')->default(0);
            $table->unsignedInteger('record_loss')->default(0);
            $table->unsignedInteger('record_draw')->default(0);
            $table->string('weight_class');
            $table->unsignedSmallInteger('height_cm')->nullable();
            $table->unsignedSmallInteger('reach_cm')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};
