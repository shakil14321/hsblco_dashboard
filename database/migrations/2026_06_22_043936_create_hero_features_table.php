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
        Schema::create('hero_features', function (Blueprint $table) {
            $table->id();

            $table->foreignId('hero_slide_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_features');
    }
};
