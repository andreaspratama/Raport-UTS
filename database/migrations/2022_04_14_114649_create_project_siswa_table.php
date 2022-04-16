<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->integer('project_id')->nullable();
            $table->string('thnakademik')->nullable();
            $table->string('nilai')->nullable();
            $table->string('task')->nullable();
            $table->text('hasil')->nullable();
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
        Schema::dropIfExists('project_siswa');
    }
}
