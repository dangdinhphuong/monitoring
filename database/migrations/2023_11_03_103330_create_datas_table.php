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
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->string('model_id');
            $table->integer('ph');
            $table->integer('ntu');
            $table->integer('temperature');
            $table->integer('do');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
            $table->foreign('model_id')->references('model')->on('nodes'); // Thay 'notes' thành 'nodes'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datas');
    }
};
