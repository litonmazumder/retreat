<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('retreat_recharge_claims', function (Blueprint $table) {
            $table->id();

            // Match this type to your existing participant primary key.
            $table->unsignedBigInteger('participant_id');

            $table->foreignId('schedule_id')
                ->constrained('retreat_schedules')
                ->cascadeOnDelete();

            $table->unsignedInteger('points')->default(0);
            $table->unsignedInteger('claim_rank')->nullable();
            $table->timestamp('claimed_at')->useCurrent();

            $table->timestamps();

            $table->unique(
                ['participant_id', 'schedule_id'],
                'recharge_participant_schedule_unique'
            );

            $table->index(['schedule_id', 'claimed_at']);
            $table->index(['participant_id', 'points']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retreat_recharge_claims');
    }
};