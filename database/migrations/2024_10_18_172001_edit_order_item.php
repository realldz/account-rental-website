<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('amount'); // Xoá cột amount
            $table->integer('price'); // Thêm cột (price)
            $table->unsignedBigInteger('product_id'); // Thêm cột product_id
            $table->unsignedBigInteger('order_id'); // Thêm cột order_id
            $table->foreign('product_id')->references('id')->on('products'); // Đặt khoá ngoại đến bảng products
            $table->foreign('order_id')->references('id')->on('orders'); // Đặt khoá ngoại đến bảng products
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']); // Xoá khoá ngoại
            $table->dropColumn('product_id'); // Xoá cột product_id
            $table->dropForeign(['order_id']); // Xoá khoá ngoại
            $table->dropColumn('order_id'); // Xoá cột order_id
            $table->dropColumn('price'); // Xoá cột order_id
            $table->integer('amount'); // Thêm lại cột amount
        });
    }
}
