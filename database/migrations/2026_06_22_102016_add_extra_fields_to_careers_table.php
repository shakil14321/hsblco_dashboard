<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string('department')->nullable()->after('slug');
            $table->string('tech_stack')->nullable()->after('description');
            $table->string('apply_url')->nullable()->after('deadline');
        });
    }

    public function down(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn([
                'department',
                'tech_stack',
                'apply_url',
            ]);
        });
    }
};
