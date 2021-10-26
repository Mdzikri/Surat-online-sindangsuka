<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsTable extends Migration
{
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rw_id')->constrained('rws');
            $table->string('no');
            $table->string('ketua')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rts');
    }
}
