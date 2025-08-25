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
            $table->string('bank_id', 20)->unique();
            $table->string('atm_bin', 20);
            $table->integer('card_length');
            $table->string('short_name');
            $table->string('bank_code', 10);
            $table->string('type', 10);
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
