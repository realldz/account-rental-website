<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cycles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Khóa ngoại tham chiếu tới sản phẩm
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('cycle_price'); // Giá cho chu kỳ
            $table->string('cycle_unit')->comment('date: 1, week: 2, month: 3, year: 4'); // Đơn vị chu kỳ (ngày, tuần, tháng)
            $table->integer('cycle_value'); // Giá trị chu kỳ (1, 2, 3,...)
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
        Schema::dropIfExists('product_cycles');
    }
}
