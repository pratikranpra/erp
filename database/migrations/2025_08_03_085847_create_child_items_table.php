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
        Schema::create('child_items', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('parent_item_id')->default(0);
            $table->bigInteger('item_id')->nullable()->default(0);
            $table->bigInteger('item_child_qty')->default(0);
            $table->bigInteger('item_child_unit')->default(0);
            $table->bigInteger('item_child_vendor')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_items');
    }
};
