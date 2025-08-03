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
        Schema::create('gst_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->index('category_id');
            $table->integer('gst_range_min')->default(0);
            $table->integer('gst_range_max')->default(0);
            $table->string('gst_no');
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
        Schema::dropIfExists('gst_master');
    }
};
