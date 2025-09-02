<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Wards
        Schema::create('vn_banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bank_id', 20)->unique()->nullable();
            $table->string('atm_bin', 20)->nullable();
            $table->integer('card_length')->nullable();
            $table->string('short_name')->nullable();
            $table->string('bank_code', 10)->nullable();
            $table->string('type', 10)->nullable();
            $table->string('swift_code', 20)->nullable();
            $table->timestamps();
        });

        $sqlFile = __DIR__ . '/vn-banks.sql';
        if (file_exists($sqlFile)) {
            DB::unprepared(file_get_contents($sqlFile));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vn_banks');
    }
};
