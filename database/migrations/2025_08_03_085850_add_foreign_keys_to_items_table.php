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
        Schema::table('items', function (Blueprint $table) {
            $table->foreign(['category_id'], 'items_ibfk_1')->references(['id'])->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['subcategory_id'], 'items_ibfk_2')->references(['id'])->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_ibfk_1');
            $table->dropForeign('items_ibfk_2');
        });
    }
};
