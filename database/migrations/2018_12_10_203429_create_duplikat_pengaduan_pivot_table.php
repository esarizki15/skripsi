<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuplikatPengaduanPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duplikat_pengaduan', function (Blueprint $table) {
            $table->integer('duplikat_id')->unsigned()->index();
            $table->foreign('duplikat_id')->references('id')->on('duplikats')->onDelete('cascade');
            $table->integer('pengaduan_id')->unsigned()->index();
            $table->foreign('pengaduan_id')->references('id')->on('pengaduans')->onDelete('cascade');
            $table->primary(['duplikat_id', 'pengaduan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duplikat_pengaduan');
    }
}
