<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // auto increment, BIGINT UNSIGNED
            $table->string('name'); // VARCHAR(255)
            $table->string('email')->unique(); // VARCHAR(255), UNIQUE
            $table->text('address')->nullable(); // TEXT, NULLABLE
            $table->timestamps(0); // created_at, updated_at with TIMESTAMP type, NULLABLE
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
