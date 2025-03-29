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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('user_pin');
            $table->string('department');
            $table->string('sub_department')->nullable();
            $table->bigInteger('contact');
            $table->bigInteger('home_contact')->nullable();
            $table->string('aadhar_no');
            $table->string('attachment');
            $table->string('aadhar_name');
            $table->enum('status', ['active', 'inactive']);
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
