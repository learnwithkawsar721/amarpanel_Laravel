<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTriketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_trikets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('order_id')->nullable()->comment('subject_order');
            $table->string('request')->nullable()->comment('subject_order');
            $table->string('payment')->nullable()->comment('subject_payment');
            $table->string('type')->nullable()->comment('subject_request');
            $table->integer('role')->default(1);
            $table->integer('action')->default(1);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('customer_trikets');
    }
}
