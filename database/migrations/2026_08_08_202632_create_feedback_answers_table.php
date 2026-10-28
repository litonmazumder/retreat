<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_answers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('feedback_question_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('participant_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('feedback_option_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->text('answer_text')->nullable();

            $table->decimal('answer_number', 5, 2)->nullable();

            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();

            $table->unique([
                'feedback_question_id',
                'participant_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_answers');
    }
};
