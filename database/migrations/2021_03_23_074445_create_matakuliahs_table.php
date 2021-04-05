<?php
// Membuat Tabel Mata Kuliah
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{

    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('kode_mk',25);
            $table->string('nama_mk',50);
            $table->enum('jenis',['W','P','U']);
            $table->integer('sks');
            $table->integer('semester');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('matakuliahs');
    }
}
