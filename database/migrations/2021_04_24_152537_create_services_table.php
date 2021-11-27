<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('services_name');
            $table->double('reate');
            $table->integer('min');
            $table->integer('mix');
            $table->string('start_time')->nullable();
            $table->string('speed')->nullable();
            $table->string('guarante')->nullable();
            $table->string('average_time')->nullable();
            $table->longText('description')->nullable();
            $table->integer('role')->default(1);
            $table->integer('action')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('services');
    }
}
