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
            $table->integer('sr_id')->nullable(); //restarts for each company
            $table->string('barcode')->unique()->comment('Scan from bar code reader or auto generate');
            $table->string('name')->unique();
            $table->string('name_urdu')->unique();
            $table->string('inv_display_name')->default('name');

            $table->string('label_txt')->unique();
            $table->date('manufacturing_date')->nullable()->comment('publishing date');
            $table->longText('description')->nullable();
            $table->string('keywords')->nullable()->comment('comma seperated, tags');
            // $table->string('featured_image');
            // $table->string('gallery_images');
            //Packing Size Info
            $table->float('weight',6,2);
            $table->string('dimensions')->nullable();
            $table->string('total_pages')->nullable();
            $table->string('inside_box')->nullable();

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

            // $table->unsignedBigInteger('location_id_0')->comment('Counter Place');
            // $table->unsignedBigInteger('location_id_1')->comment('Shelf Place');
            // $table->unsignedBigInteger('location_id_2')->comment('Store');

            $table->tinyInteger('product_type_id'); //Book
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('author')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedTinyInteger('class_id')->nullable();
            $table->unsignedTinyInteger('language_id')->nullable();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->unsignedBigInteger('binding_id')->nulable();
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
