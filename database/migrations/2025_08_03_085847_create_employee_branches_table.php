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
        Schema::create('employee_branches', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedBigInteger('employee_id')->index('employee_id');
            $table->bigInteger('branch_id')->index('branch_id');
            $table->enum('status', ['a', 'd'])->default('a');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_branches');
    }
};
