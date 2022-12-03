<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
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
            $table->string('release_number')->nullable();
            $table->bigInteger('custom_port_id')->unsigned();
            $table->bigInteger('importer_id')->unsigned();
            $table->foreign('custom_port_id')->references('id')->on('custom_ports')->onDelete('cascade');
            $table->foreign('importer_id')->references('id')->on('importers')->onDelete('cascade');
            $table->date('received_date');
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
}
