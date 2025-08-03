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
        Schema::table('employee_branches', function (Blueprint $table) {
            $table->foreign(['branch_id'], 'employee_branches_ibfk_1')->references(['id'])->on('branches')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['employee_id'], 'employee_branches_ibfk_2')->references(['id'])->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_branches', function (Blueprint $table) {
            $table->dropForeign('employee_branches_ibfk_1');
            $table->dropForeign('employee_branches_ibfk_2');
        });
    }
};
