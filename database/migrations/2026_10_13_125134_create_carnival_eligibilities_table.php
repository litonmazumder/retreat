<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('carnival_eligibilities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('participant_id')
                ->constrained('participants')
                ->cascadeOnDelete();

            $table->foreignId('activity_id')
                ->constrained('carnival_activities')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(
                ['participant_id', 'activity_id'],
                'participant_activity_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carnival_eligibilities');
    }
};
