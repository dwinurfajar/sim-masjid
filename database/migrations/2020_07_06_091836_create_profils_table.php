<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('ketua');
            $table->string('foto_ketua')->default('default-avatar.png');
            $table->string('sekretaris');
            $table->string('foto_sekretaris')->default('default-avatar.png');
            $table->string('bendahara');
            $table->string('foto_bendahara')->default('default-avatar.png');
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
        Schema::dropIfExists('profils');
    }
}
