<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // auto increment, BIGINT UNSIGNED
            $table->foreignId('order_id')->constrained('orders'); // FOREIGN KEY ke orders
            $table->foreignId('product_id')->constrained('products'); // FOREIGN KEY ke products
            $table->unsignedInteger('quantity')->default(1); // INTEGER UNSIGNED, default 1
            $table->decimal('unit_price', 10, 2); // DECIMAL(10, 2)
            $table->decimal('subtotal', 10, 2); // DECIMAL(10, 2)
            $table->timestamps(0); // created_at, updated_at with TIMESTAMP type, NULLABLE
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}

