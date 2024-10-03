<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsTable extends Migration
{
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->string('nama_arsip');
            $table->string('lantai');
            $table->string('ruangan');
            $table->string('baris');
            $table->string('rak');
            $table->string('box');
            $table->timestamps();
        });
    }

}
