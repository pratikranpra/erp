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
        Schema::create('order_item_lists', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('order_id')->nullable()->default(0);
            $table->bigInteger('order_item_id')->default(0);
            $table->integer('order_item_qty')->default(0);
            $table->integer('order_item_unit')->default(0);
            $table->integer('order_item_rate')->default(0);
            $table->integer('order_item_disc')->default(0);
            $table->text('order_item_custom_data')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item_lists');
    }
};
