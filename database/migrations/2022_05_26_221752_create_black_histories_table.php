<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlackHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('black_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('lease_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('black_histories');
    }
}
