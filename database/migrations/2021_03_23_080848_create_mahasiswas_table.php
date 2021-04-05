<?php
// Membuat Tabel Mahasiswa
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('npm', 10)->unique();
            $table->string('kelas', 10);
            // relasi dengan tabel user
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // relasi dengan tabel fakultas
            $table->unsignedInteger('fakultas_id')->nullable();
            $table->foreign('fakultas_id')
                ->on('fakultas')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // relasi dengan tabel jurusan
            $table->unsignedInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id')
                    ->on('jurusans')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('semester');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mahasiswas');
    }
}
