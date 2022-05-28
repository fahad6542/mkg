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
    {// a table avialable for all
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('scale')->default(1);
            $table->string('short_name')->nullable(); //Symbol
            $table->longText('description');
            $table->tinyInteger('delete_status')->default(1);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('units');
    }
};
