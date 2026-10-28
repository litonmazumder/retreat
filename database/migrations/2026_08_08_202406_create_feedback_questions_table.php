<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_questions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('feedback_id')
                ->constrained('feedbacks')
                ->cascadeOnDelete();

            $table->string('title');

            $table->text('instruction')->nullable();

            $table->string('type');
            // rating
            // single_choice
            // short_text
            // long_text

            $table->boolean('required')->default(true);

            $table->boolean('anonymous')->default(true);

            $table->unsignedInteger('sort_order')->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_questions');
    }
};