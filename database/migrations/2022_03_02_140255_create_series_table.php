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
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->integer('sr_id')->nullable();
            $table->string('name');
            $table->string('name_urdu');
            $table->longText('description');
            $table->tinyInteger('delete_status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->integer('comapany_id');
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
        Schema::dropIfExists('series');
    }
};
