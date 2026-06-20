<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->after('id');
            $table->string('profile_pic')->nullable()->after('password');
            $table->string('banner')->nullable()->after('profile_pic');
            $table->string('number')->nullable()->after('email');
            $table->boolean('status')->default(1)->after('number');
            // 1 = active, 0 = inactive
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role_id',
                'profile_pic',
                'banner',
                'number',
                'status',
            ]);
        });
    }
};
