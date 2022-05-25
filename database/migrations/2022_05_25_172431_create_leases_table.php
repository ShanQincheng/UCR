<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('computer_id');
            $table->float('deposit');
            $table->float('insurance');
            $table->integer('discount');
            $table->integer('start_time');
            $table->integer('end_time');
            $table->integer('return_time')->nullable();
            $table->integer('staff_confirm')->nullable();
            $table->float('fee');
            $table->float('fee_penalty')->default(0.0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leases');
    }
}
