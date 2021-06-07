<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('user_id', true);
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('first_name');
            $table->date('birthdate');
            $table->string('gender', 11)->nullable();
            $table->string('street')->nullable();
            $table->string('block_lot')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('province')->nullable();
            $table->string('email')->nullable();
            $table->string('is_active', 10)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->integer('start_pay')->nullable();
            $table->date('date_joined');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
