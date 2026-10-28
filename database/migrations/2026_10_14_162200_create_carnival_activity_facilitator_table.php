<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carnival_activity_facilitator', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activity_id')
                ->constrained('carnival_activities')
                ->cascadeOnDelete();

            $table->foreignId('participant_id')
                ->constrained('participants')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['activity_id', 'participant_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carnival_activity_facilitator');
    }
};
