<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMohonKtpsTable extends Migration
{
    public function up()
    {
        Schema::create('mohon_ktps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->integer('nomor')->default(0);
            $table->string('jenis_permohonan');
            $table->string('no_kk');
            $table->string('nama_kk');
            $table->string('kode_pos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mohon_ktps');
    }
}
