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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->integer('sr_id')->nullable();
            $table->string('name');
            $table->string('name_urdu')->nullable();
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->string('avatar', 100)->default('');
            $table->text('address')->nullable();
            $table->text('address_urdu')->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by')->default(0);
            $table->tinyInteger('delete_status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->integer('company_id');
            $table->timestamps();
            $table->unique(["name", "company_id"], 'publisher_company_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publishers');
    }
};
