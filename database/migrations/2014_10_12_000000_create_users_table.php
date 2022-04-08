<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rt_id')->default("0")->nullable();
            $table->foreignId('rw_id')->default("0")->nullable();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('no_kk');
            $table->string('ttl');
            $table->string('agama');
            $table->string('jk');
            $table->string('status');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('kewarganegaraan');
            $table->string('password');
            $table->boolean('status_verifikasi')->default(1);
            $table->string('telp')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('pasfoto')->nullable();
            $table->string('fotoktp')->nullable();
            $table->string('fotokk')->nullable();
            $table->boolean('status_lengkap')->default(0);
            $table->char('status_user')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
