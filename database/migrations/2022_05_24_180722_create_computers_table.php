<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('brand');
            $table->string('picture');
            $table->float('rent');
            $table->integer('stocks');
            $table->string('os');
            $table->string('DISP_size');
            $table->string('RAM');
            $table->string('USB_port_num');
            $table->string('HDMI_port');
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
