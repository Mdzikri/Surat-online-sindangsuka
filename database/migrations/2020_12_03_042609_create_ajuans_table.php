<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('penindak')->nullable();
            $table->string('nosurat')->default('0');
            $table->string('jenis');
            $table->string('keterangan')->default('Perlengkapan Administrasi');
            $table->string('kades')->nullable();
            $table->string('ttd')->nullable();
            $table->integer('acc')->default(0);
            $table->text('pesan_penolakan')->nullable();
            $table->string('kode')->default('0');
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
        Schema::dropIfExists('ajuans');
    }
}
