<?php
// Membuat Tabel fakultas
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakultasTable extends Migration
{
    public function up()
    {
        Schema::create('fakultas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nama_fakultas',150);
            $table->string('singkatan',10)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fakultas');
    }
}
