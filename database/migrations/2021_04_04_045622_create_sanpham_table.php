<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tensanpham')->unique();
            $table->integer('gia')->default(0);
            $table->integer('soluong')->default(0);
            $table->integer('loaisanpham_id')->index()->default(0);
            $table->string('hinhanh')->nullable();
            $table->text('mota')->nullable();
            $table->string('slug')->unique();


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
        Schema::dropIfExists('sanpham');
    }
}