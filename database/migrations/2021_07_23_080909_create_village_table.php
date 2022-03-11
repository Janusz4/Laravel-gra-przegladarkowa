<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_castle');
            $table->foreignId('id_sawmill');
            $table->foreignId('id_quarry');
            $table->foreignId('id_field');
            $table->foreignId('id_barracks');
            $table->timestamps();
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('id_castle')
                ->references('id')
                ->on('castles')
                ->onDelete('cascade');
            $table->foreign('id_sawmill')
                ->references('id')
                ->on('sawmills')
                ->onDelete('cascade');
            $table->foreign('id_quarry')
                ->references('id')
                ->on('quarries')
                ->onDelete('cascade');
            $table->foreign('id_field')
                ->references('id')
                ->on('fields')
                ->onDelete('cascade');
            $table->foreign('id_barracks')
                ->references('id')
                ->on('barracks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
