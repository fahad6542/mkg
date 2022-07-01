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
        //Product Group
        Schema::create('product_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->tinyInteger('delete_status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_delete_able')->default(1);
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
        Schema::dropIfExists('product_types');
    }
};
