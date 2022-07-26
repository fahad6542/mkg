<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId               ('p_id');
            $table->integer                 ('product_id');
            //Books
            $table->string                  ('total_pages') ->nullable();
            $table->string                  ('size')        ->nullable();
            $table->string                  ('ISBN')        ->nullable()->comment('International Standard Book Number');
            $table->unsignedBigInteger      ('author')      ->nullable();
            $table->unsignedBigInteger      ('topic_id')    ->nullable();
            $table->unsignedBigInteger      ('edition')     ->nullable();
            $table->unsignedTinyInteger     ('class_id')    ->nullable();
            $table->unsignedTinyInteger     ('language_id') ->nullable();
            $table->unsignedBigInteger      ('series_id')   ->nullable();
            $table->unsignedBigInteger      ('binding_id')  ->nullable();
            $table->unsignedTinyInteger     ('unit_id')     ->nullable();
            $table->string                  ('additional_topics')->nullable();
            $table->string                  ('pack_size')   ->nullable();
            $table->string                  ('calculate')   ->nullable();


            //Uniform
            $table->string                  ('color')       ->nullable();
            //Notebooks
            $table->unsignedBigInteger('school_id')->nullable();
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
        Schema::dropIfExists('product_metas');
    }
}
