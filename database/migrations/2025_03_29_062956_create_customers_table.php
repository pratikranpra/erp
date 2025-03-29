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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('registered_address');
            $table->text('billing_address');
            $table->string('owner_name');
            $table->string('owner_phone', 10);
            $table->string('accountant_name')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('owner_email');
            $table->text('payment_terms');
            $table->string('gst_no')->nullable();
            $table->string('gst_date')->nullable();
            $table->integer('discount')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
