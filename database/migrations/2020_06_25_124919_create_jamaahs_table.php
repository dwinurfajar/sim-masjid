<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJamaahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->boolean('jenisKelamin');
            $table->string('telephone');
            $table->string('alamat');
            $table->char('aktif', 1)->default('0');
            $table->boolean('zakat')->default('0');
            $table->string('latt');
            $table->string('long');
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
        Schema::dropIfExists('jamaahs');
    }
}
