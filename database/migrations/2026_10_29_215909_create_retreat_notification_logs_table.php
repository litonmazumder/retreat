<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('retreat_notification_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('schedule_id')
                ->nullable()
                ->constrained('retreat_schedules')
                ->nullOnDelete();

            // Examples: reminder_15m, reminder_5m, recharge_open
            $table->string('notification_type', 50);

            // Unique identifier for this scheduled notification event.
            $table->string('unique_key', 191)->unique();

            $table->timestamp('scheduled_for');
            $table->string('status', 30)->default('pending');
            $table->timestamp('sent_at')->nullable();
            $table->text('error_message')->nullable();

            $table->timestamps();

            $table->index(['status', 'scheduled_for']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retreat_notification_logs');
    }
};