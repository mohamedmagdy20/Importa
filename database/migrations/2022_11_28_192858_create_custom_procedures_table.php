<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('procedure_num');
            $table->bigInteger('transaction_id')->unsigned();   
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade'); 
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
        Schema::dropIfExists('custom_procedures');
    }
}
