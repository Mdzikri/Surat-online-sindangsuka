<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedaNamasTable extends Migration
{
    public function up()
    {
        Schema::create('beda_namas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->integer('nomor')->default(0);
            $table->string('perbedaan');
            $table->string('dokumen1');
            $table->string('data1');
            $table->string('dokumen2');
            $table->string('data2');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beda_namas');
    }
}
