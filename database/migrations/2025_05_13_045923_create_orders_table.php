<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // auto increment, BIGINT UNSIGNED
            $table->foreignId('customer_id')->constrained('customers'); // FOREIGN KEY ke customers
            $table->string('tracking_number')->nullable();
            $table->date('order_date'); // DATE
            $table->decimal('total_amount', 10, 2)->default(0.00); // DECIMAL(10, 2)
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending'); // ENUM
            $table->timestamps(0); // created_at, updated_at with TIMESTAMP type, NULLABLE
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

