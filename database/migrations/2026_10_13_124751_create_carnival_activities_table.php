<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('carnival_activities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('heading')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('slug')->unique();

            $table->text('description')->nullable();
            $table->json('instructions')->nullable();

            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('venue')->nullable();

            $table->date('session_date')->nullable();

            $table->time('wave_1_start_time')->nullable();
            $table->time('wave_1_end_time')->nullable();
            $table->time('wave_2_start_time')->nullable();
            $table->time('wave_2_end_time')->nullable();

            $table->boolean('is_active')->default(true);

            $table->string('type')->nullable();
            $table->text('facilitators')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carnival_activities');
    }
};
