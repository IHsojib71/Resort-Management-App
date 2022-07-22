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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('resort_id');//foreign key for eloquent ORM 
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->date('reserve_date_from');
            $table->date('reserve_date_to');
            $table->string('resort_title');
            $table->timestamps();
            // $table->foreign('resort_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
