<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->integer('mapel_id')->nullable();
            $table->string('thnakademik')->nullable();
            $table->string('nilai')->nullable();
            $table->string('project')->nullable();
            $table->string('nilai_pro')->nullable();
            $table->string('task')->nullable();
            $table->text('hasil')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('mapel_siswa');
    }
}
