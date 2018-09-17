<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyelesaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyelesaians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_id')->unsigned();
            $table->boolean('status')->nullable();
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('pengajuan_id')->references('id')->on('pengajuans')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyelesaians');
    }
}
