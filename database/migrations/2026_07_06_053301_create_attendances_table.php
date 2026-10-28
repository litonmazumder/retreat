<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('attendances', function (Blueprint $table) {

        $table->id();

        $table->foreignId('participant_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->tinyInteger('day');

        $table->timestamp('checked_in_at');

        $table->enum('method', [
            'kiosk',
            'mobile',
            'staff'
        ])->default('kiosk');

        $table->timestamps();

        $table->unique(['participant_id', 'day']);

    });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};