<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['cycle_id']);
            
            $table->foreign('cycle_id')
                ->references('id')
                ->on('product_cycles')
                ->onDelete('cascade');

            $table->dropForeign(['product_id']);
            $table->bigInteger('product_id')->unsigned()->nullable()->change();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->dropForeign(['user_id']);
            $table->bigInteger('user_id')->unsigned()->nullable()->change();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->bigInteger('product_id')->unsigned()->nullable()->change();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->dropForeign(['user_id']);
            $table->bigInteger('user_id')->unsigned()->nullable()->change();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->bigInteger('user_id')->unsigned()->nullable()->change();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->bigInteger('product_id')->unsigned()->nullable()->change();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->dropForeign(['order_id']);
            $table->bigInteger('order_id')->unsigned()->nullable()->change();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->bigInteger('category_id')->unsigned()->nullable()->change();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['cycle_id']);
            $table->foreign('cycle_id')
                ->references('id')
                ->on('product_cycles')
                ->onDelete('no action');

            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action');

            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action');

            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action');

            $table->dropForeign(['order_id']);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('no action');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('no action');
        });
    }
}
