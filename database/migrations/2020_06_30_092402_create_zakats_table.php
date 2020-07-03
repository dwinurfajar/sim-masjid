<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakats', function (Blueprint $table) {
            $table->id();
            //$table->string('nama_pegawai',100);
            //$table->string('jenis_kelamin',20);
            //$table->string('email',100)->nullable();
            //$table->string('alamat',150)->nullable();
            $table->string('nama');
            $table->char('jenisZakat', 1);
            $table->char('jenisBayar', 1);
            $table->string('lainnya')->nullable();
            $table->integer('jumlahT');
            $table->integer('jumlahBeras');
            $table->date('tanggal');
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
        Schema::dropIfExists('zakats');
    }
}
