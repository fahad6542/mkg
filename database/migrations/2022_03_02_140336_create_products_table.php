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
            $table->integer('sr_id'); //restarts for each company
            $table->string('barcode');
            $table->string('name');
            $table->string('name_urdu');
            $table->string('inv_display_name');

            $table->string('label_txt');
            $table->longText('description');
            $table->string('keywords');
            $table->string('featured_image');
            $table->string('gallery_images');
            $table->date('publish_date');
            $table->string('weight');
            $table->string('dimensions');
            $table->string('total_pages');
            $table->string('inside_box');
            $table->string('ISBN');

            $table->float('l_sale_price',15,2)->default('0.00');
            $table->float('l_comission',3,2)->default('0.00');
            $table->float('l_purchase_price',15,2)->default('0.00');
            $table->integer('retail_discount_policy');
            $table->integer('whole_sale_discount_policy');

            $table->float('p_sale_price',15,2)->default('0.00');
            $table->float('p_comission',3,2)->default('0.00');
            $table->float('p_purchase_price',15,2)->default('0.00');
            $table->float('rental_discount_amt',3,2)->default('0.00');
            $table->float('lw_sale_discount')->default('0.00');

            $table->float('supplier_price',15,2)->default('0.00');
            $table->float('trade_percentage',3,2)->default('0.00');
            $table->float('purchase_price',15,2)->default('0.00');
            $table->float('p_retail_discount_amt',3,2)->default('0.00');
            $table->float('pw_sales_discount',3,2)->default('0.00');

            $table->string('type')->default('book');
            $table->unsignedInteger('unit_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('author');
            $table->unsignedBigInteger('topic_id');
            $table->unsignedTinyInteger('class_id');
            $table->unsignedTinyInteger('language_id');
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('binding_id');
            $table->unsignedTinyInteger('is_avialable_online')->default('1');

            $table->tinyInteger('delete_status')->default(1);
            $table->tinyInteger('is_active')->default(1);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by')->default(0);

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
