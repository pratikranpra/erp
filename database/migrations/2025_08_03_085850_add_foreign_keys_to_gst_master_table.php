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
        Schema::table('gst_master', function (Blueprint $table) {
            $table->foreign(['category_id'], 'gst_master_ibfk_1')->references(['id'])->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gst_master', function (Blueprint $table) {
            $table->dropForeign('gst_master_ibfk_1');
        });
    }
};
