<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('jabatan')->after('name');
            $table->foreignId('atasan_id')
                  ->nullable()
                  ->after('jabatan')
                  ->constrained('users')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['atasan_id']);
            $table->dropColumn(['jabatan', 'atasan_id']);
        });
    }
};