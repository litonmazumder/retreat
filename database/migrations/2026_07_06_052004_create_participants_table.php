<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {

            $table->id();

            $table->foreignId('event_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->uuid('uuid')->unique();

            $table->string('first_name');

            $table->string('last_name')->nullable();

            $table->string('email')->unique();

            $table->timestamp('email_verified_at')->nullable();

            $table->string('project_name')->nullable();

            $table->string('designation')->nullable();

            $table->string('region')->nullable();

            $table->enum('status', [
                'Active',
                'Inactive'
            ])->default('Active');

            $table->boolean('profile_confirmed')->default(false);

            $table->timestamp('last_login_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};