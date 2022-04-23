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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('subsubcategory_id');
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('slug_en');
            $table->string('slug_bn');
            $table->string('code');
            $table->string('qty');
            $table->string('tag_en');
            $table->string('tag_bn');
            $table->string('size_en')->nullable();
            $table->string('size_bn')->nullable();
            $table->string('color_en');
            $table->string('color_bn');
            $table->string('sale_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc_en');
            $table->string('short_desc_bn');
            $table->text('long_desc_en');
            $table->text('long_desc_bn');
            $table->string('thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
