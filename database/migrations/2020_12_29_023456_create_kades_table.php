<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kades', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('ttl');
            $table->string('agama');
            $table->string('jk');
            $table->string('alamat');
            $table->string('jabatan');
            $table->string('periode')->nullable();
            $table->string('ttdcap')->nullable();
            $table->string('fotokades')->default('default.jpeg');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('kades');
    }
}
