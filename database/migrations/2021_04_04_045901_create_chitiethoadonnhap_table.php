<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiethoadonnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadonnhap', function (Blueprint $table) {
            $table->id();
             $table->integer('hoadonnhap_id')->default(0);
            $table->integer('sanpham_id')->default(0);
            $table->integer('soluong')->default(0);
            $table->string('donvitinh')->nullable();
            $table->integer('gianhap')->nullable();
            $table->datetime('hansudung');
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
        Schema::dropIfExists('chitiethoadonnhap');
    }
}