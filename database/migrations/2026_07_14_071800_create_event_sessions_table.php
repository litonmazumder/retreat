<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_sessions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('event_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('participant_id')
                ->nullable()
                ->constrained('participants')
                ->nullOnDelete();

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('venue')->nullable();

            $table->unsignedTinyInteger('day');

            $table->date('session_date');

            $table->time('start_time');

            $table->time('end_time');

            $table->enum('type', [

                'opening',

                'keynote',

                'presentation',

                'panel',

                'break',

                'closing',

            ])->default('presentation');

            $table->timestamp('started_at')->nullable();

            $table->timestamp('ended_at')->nullable();

            $table->integer('sort_order')->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_sessions');
    }
};