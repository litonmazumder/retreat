<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_presentations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('feedback_id')
                ->constrained('feedbacks')
                ->cascadeOnDelete()
                ->unique();

            $table->foreignId('current_question_id')
                ->nullable()
                ->constrained('feedback_questions')
                ->nullOnDelete();

            $table->enum('status', [
                'Waiting',
                'Live',
                'Paused',
                'Finished',
            ])->default('Waiting');

            $table->boolean('show_results')->default(false);

            $table->timestamp('started_at')->nullable();

            $table->timestamp('finished_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_presentations');
    }
};