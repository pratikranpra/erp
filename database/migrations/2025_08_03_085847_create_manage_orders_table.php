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
        Schema::create('manage_orders', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('customer_id')->default(0);
            $table->bigInteger('employee_id')->default(0);
            $table->bigInteger('bill_no')->default(0);
            $table->string('sku', 121)->nullable();
            $table->timestamp('order_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->text('remark')->nullable();
            $table->tinyInteger('product_type')->default(1)->comment('1:Manufacture, 2:ReadyMade');
            $table->integer('shipping_address_id')->default(0);
            $table->tinyInteger('shopping_mode')->default(4)->comment('1:Air, 2:Road,3:Transport,4:other');
            $table->string('transporter', 21)->nullable();
            $table->double('charge')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0:Pending,1:Completed,2:Cancelled');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_orders');
    }
};
