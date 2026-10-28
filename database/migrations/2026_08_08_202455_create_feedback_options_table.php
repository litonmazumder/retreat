<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_options', function (Blueprint $table) {

            $table->id();

            $table->foreignId('feedback_question_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->unsignedInteger('sort_order')->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_options');
    }
};