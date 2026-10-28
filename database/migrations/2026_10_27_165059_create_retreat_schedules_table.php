
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('retreat_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            $table->date('schedule_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->string('venue')->nullable();
            $table->string('icon', 20)->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index([
                'event_id',
                'schedule_date',
                'is_active',
            ], 'retreat_schedules_event_date_active_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retreat_schedules');
    }
};
