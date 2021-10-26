<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->integer('nomor')->default(0);
            $table->string('hubungan', 191);
            $table->string('nama_alm', 191);
            $table->string('jk_alm', 191);
            $table->string('alamat_alm', 191);
            $table->string('agama_alm', 191);
            $table->string('umur_alm', 191);
            $table->string('hari', 191);
            $table->string('tanggal', 191);
            $table->string('pukul', 191);
            $table->string('tempat', 191);
            $table->string('penyebab', 191);
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
        Schema::dropIfExists('sks');
    }
}
