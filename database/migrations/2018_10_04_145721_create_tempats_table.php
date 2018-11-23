<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 45);
            $table->unsignedInteger('perusahaan_id')->nullable();
            $table->timestamps();

            $table->foreign('perusahaan_id')->references('id')->on('perusahaans')
            ->onUpdate('cascade')->onDelete('cascade');
            
        });

        Schema::table('tempats', function (Blueprint $table) {
            $table->unsignedInteger('tempat_id')->nullable();
            $table->foreign('tempat_id')->references('id')->on('tempats');
        });

        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('tempats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempats');
    }
}
