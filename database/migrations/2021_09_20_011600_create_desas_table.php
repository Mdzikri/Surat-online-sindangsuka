<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa')->default('*atur nama Desa');
            $table->string('alamat_kantor')->default('*atur alamat kantor Desa');
            $table->string('logo_desa')->default('logo.png');
            $table->string('kecamatan')->default('Cibatu');
            $table->string('kabupaten')->default('Garut');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desas');
    }
}
