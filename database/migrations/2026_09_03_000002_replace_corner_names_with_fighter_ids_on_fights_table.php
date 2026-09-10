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
        Schema::table('fights', function (Blueprint $table) {
            $table->foreignId('red_fighter_id')
                ->nullable()
                ->after('id')
                ->constrained('fighters')
                ->nullOnDelete();

            $table->foreignId('blue_fighter_id')
                ->nullable()
                ->after('red_fighter_id')
                ->constrained('fighters')
                ->nullOnDelete();
        });

        Schema::table('fights', function (Blueprint $table) {
            $table->dropColumn(['red_corner', 'blue_corner']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fights', function (Blueprint $table) {
            $table->string('red_corner')->nullable()->after('id');
            $table->string('blue_corner')->nullable()->after('red_corner');
        });

        Schema::table('fights', function (Blueprint $table) {
            $table->dropConstrainedForeignId('red_fighter_id');
            $table->dropConstrainedForeignId('blue_fighter_id');
        });
    }
};
