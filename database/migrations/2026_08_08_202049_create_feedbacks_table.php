<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->string('title');

            $table->text('description')->nullable();

            $table->foreignId('event_day_id')
                ->nullable()
                ->constrained('event_days')
                ->nullOnDelete();

            $table->enum('status', [
                'Draft',
                'Open',
                'Closed'
            ])->default('Draft');

            $table->dateTime('starts_at')->nullable();

            $table->dateTime('ends_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};