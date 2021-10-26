<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSktbsTable extends Migration
{
    public function up()
    {
        Schema::create('sktbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->integer('nomor')->default(0);
            $table->string('properti');
            $table->string('lokasi');
            $table->string('luas');
            $table->string('atas_nama');
            $table->string('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sktbs');
    }
}
