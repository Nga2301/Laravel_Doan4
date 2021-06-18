<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('giaban', function (Blueprint $table) {
            $table->id();
            $table->integer('sanpham_id')->index()->default(0);
            $table->integer('gia')->defautl(0);
            //$table->integer('chietkhau')->defautl(0);
            $table->datetime('ngayhieuluc')->nullable();
            $table->datetime('ngayhethieuluc')->nullable();
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
        Schema::dropIfExists('giaban');
    }
}