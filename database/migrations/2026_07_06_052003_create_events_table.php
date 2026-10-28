<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('venue');

            $table->string('timezone')->default('Asia/Dhaka');

            $table->dateTime('registration_start');
            $table->dateTime('registration_end');

            $table->dateTime('event_start');
            $table->dateTime('event_end');

            $table->enum('status', [
                'Draft',
                'Published',
                'Completed',
                'Cancelled'
            ])->default('Draft');

            $table->boolean('is_registration_open')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};