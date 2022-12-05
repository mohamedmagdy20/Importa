<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetCustomProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_custom_procedure', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('custom_procedure_id')->unsigned(); 
            $table->foreign('custom_procedure_id')->references('id')->on('custom_procedures')->onDelete('cascade'); 
            $table->bigInteger('shipment_agent_id')->unsigned();
            $table->foreign('shipment_agent_id')->references('id')->on('shipping_agents')->onDelete('cascade'); 
            $table->date('arrive_date');
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
        Schema::dropIfExists('get_custom_procedure');
    }
}
