<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('retreat_recharge_claims', function (Blueprint $table) {
            $table->foreign('participant_id')
                ->references('id')
                ->on('participants')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('retreat_recharge_claims', function (Blueprint $table) {
            $table->dropForeign(['participant_id']);
        });
    }
};