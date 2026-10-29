<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('retreat_push_subscriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('participant_id');

            // Store the full endpoint and index its SHA-256 hash.
            $table->text('endpoint');
            $table->char('endpoint_hash', 64)->unique();

            $table->text('public_key');
            $table->text('auth_token');
            $table->string('content_encoding', 50)->nullable();

            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('disabled_at')->nullable();

            $table->timestamps();

            $table->index('participant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retreat_push_subscriptions');
    }
};