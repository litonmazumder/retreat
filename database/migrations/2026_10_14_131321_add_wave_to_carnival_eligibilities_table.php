<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carnival_eligibilities', function (Blueprint $table) {
            $table->string('wave', 10)->nullable()->after('activity_id');
        });
    }

    public function down(): void
    {
        Schema::table('carnival_eligibilities', function (Blueprint $table) {
            $table->dropColumn('wave');
        });
    }
};
