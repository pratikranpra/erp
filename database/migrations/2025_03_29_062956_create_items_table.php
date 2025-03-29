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
        Schema::create('items', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('sku');
            $table->string('name');
            $table->text('description');
            $table->bigInteger('category_id')->index('category_id');
            $table->bigInteger('subcategory_id')->index('subcategory_id');
            $table->integer('unit');
            $table->string('weight');
            $table->string('gst');
            $table->float('rate');
            $table->float('discount');
            $table->integer('child_qty');
            $table->enum('product_type', ['ready', 'mfg'])->default('ready');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->index(['id', 'category_id'], 'id');
            $table->index(['id', 'subcategory_id'], 'id_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
