<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('tricat_id')->nullable();
            $table->longText('message')->nullable();
            $table->longText('replay')->nullable();
            $table->integer('role')->default(1);
            $table->integer('action')->default(1);
            $table->integer('status')->default(1);
            $table->integer('replay_status')->default(1);
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
        Schema::dropIfExists('customer_messages');
    }
}
