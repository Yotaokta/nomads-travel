<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
             $table->integer('travel_package_id')->unsigned();
             $table->integer('users_id')->unsigned()->nullable();
             $table->integer('additional_visa')->unsigned();
             $table->integer('transactional_total')->unsigned();
             $table->enum('transactional_status', ['IN_CART', 'PENDING', 'SUCCESS', 'CANCEL', 'FAILED']);
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
        Schema::dropIfExists('transactions');
    }
};
