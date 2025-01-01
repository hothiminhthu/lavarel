<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->Integer('category_id')->unsigned();
            $table->Integer('brand_id')->unsigned();
            $table->string('product_name');
            $table->text('product_desc');
            $table->text('product_content');
            $table->decimal('product_price', 10,2);
            $table->string('product_image');
            $table->Integer('product_status');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('tbl_category_product')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('tbl_brand_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
};
