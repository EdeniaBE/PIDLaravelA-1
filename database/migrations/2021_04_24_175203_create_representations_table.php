<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_id');
            $table->dateTime('when');
            $table->foreignId('location_id')->nullable();

            $table->foreign('show_id')->references('id')->on('shows')
                ->onDelete('restrict')->onUpdate('Cascade');

            $table->foreign('location_id')->references('id')->on('locations')
                ->onDelete('restrict')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representations');
    }
}
