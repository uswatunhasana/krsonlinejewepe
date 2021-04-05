<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{

    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nama_jurusan',150);
            $table->string('singkatan',10)->unique();
            //relasi fakultas
            $table->unsignedInteger('fakultas_id')->nullable();
            $table->foreign('fakultas_id')
                ->on('fakultas')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusans');
    }
}
