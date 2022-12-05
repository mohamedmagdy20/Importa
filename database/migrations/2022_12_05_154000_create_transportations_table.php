<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('container_id')->unsigned();
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade'); 
            $table->bigInteger('deiver_id')->unsigned();
            $table->foreign('deiver_id')->references('id')->on('drivers')->onDelete('cascade'); 
            $table->dateTime('container_out_date');
            $table->dateTime('arrive_date');
            $table->dateTime('leave_date');
            $table->dateTime('container_arrive_date');
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
        Schema::dropIfExists('transportations');
    }
}
