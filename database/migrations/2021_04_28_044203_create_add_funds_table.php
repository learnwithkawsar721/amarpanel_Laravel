<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_funds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('method');
            $table->string('sendmoney');
            $table->string('sender_number');
            $table->string('transaction_id')->unique();
            $table->double('dollar');
            $table->double('bd_amount')->nullable();
            $table->integer('role')->default(1);
            $table->integer('status')->default(1);
            $table->integer('notification')->default(1);
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
        Schema::dropIfExists('add_funds');
    }
}
