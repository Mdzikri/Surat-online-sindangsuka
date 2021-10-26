<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwsTable extends Migration
{
    public function up()
    {
        Schema::create('rws', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('ketua')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rws');
    }
}
