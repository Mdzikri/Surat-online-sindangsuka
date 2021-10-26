<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelumMenikahsTable extends Migration
{
    public function up()
    {
        Schema::create('belum_menikahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->integer('nomor')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('belum_menikahs');
    }
}
