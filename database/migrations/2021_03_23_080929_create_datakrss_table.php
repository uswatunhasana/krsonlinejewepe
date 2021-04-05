<?php
// Membuat Tabel datakrs
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakrssTable extends Migration
{
    public function up()
    {
        Schema::create('datakrss', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('kode_krs', 100);
            $table->integer('jumlah');
            // relasi user
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->on('users')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // relasi tabel mahasiswa
            $table->unsignedInteger('mahasiswa_id')->nullable();
            $table->foreign('mahasiswa_id')
                    ->on('mahasiswas')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // relasi tabel matakuliah
            $table->unsignedInteger('matakuliah_id')->nullable();
            $table->foreign('matakuliah_id')
                ->on('matakuliahs')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('datakrss');
    }
}
