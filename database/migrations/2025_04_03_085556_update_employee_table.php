<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('attachment', 255)->nullable()->default(null)->charset('utf8mb4')->collation('utf8mb4_general_ci')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('attachment', 255)->nullable()->default(null)->charset('utf8')->collation('utf8_general_ci')->change();
        });
    }
};
