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
        Schema::create('travel_package', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->string('slug');
            $table->string('location', 30);
            $table->longText('about');
            $table->string('featured_event', 20);
            $table->enum('language', ['Indonesia', 'Inggris']);
            $table->enum('food', ['Local Food', 'Oriental Food', 'Europa Food'])->default('Local Food');
            $table->date('departure_date');
            $table->string('duration', 10);
            $table->string('type', 20);
            $table->integer('price')->unsigned()->default(0);
            $table->softDeletes(); //membuat column deleted_at
            $table->timestamps(); //atrribute ini akan membuat column created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_package');
    }
};
