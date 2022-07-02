<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            // $table->unsignedBigInteger('product_id');
            $table->foreignId('product_id')->constrained();
            $table->unsignedBigInteger('location_0'); //Shelf counter
            $table->unsignedBigInteger('location_1')->nullable(); //Store
            $table->unsignedBigInteger('location_2')->nullable(); //Warehouse
            $table->unique(["branch_id", "product_id"], 'branch_product_location_unique');
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
        Schema::dropIfExists('product_locations');
    }
}
