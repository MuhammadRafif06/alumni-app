<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('siswa_id');
            //untuk foreign key / relasi
            $table->bigInteger('id_jenkel')->unsigned();
            $table->foreign('id_jenkel')
            //referensi column dari table indukan / master
            ->references('id')
            //referensi table yang akan direlasikan
            ->on('jenis_kelamin')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama',255);
            $table->string('nik',11);
            $table->string('jurusan',11);
            $table->string('angkatan',4);
            $table->longText('alamat',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
