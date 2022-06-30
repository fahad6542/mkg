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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('sr_id')->default(0); //restarts for each company
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type', 20)->default('customer');
            //$table->tinyInteger('role_id')->default(4); //default customer
            $table->string('avatar', 200)->nullable();

            $table->integer('plan')->nullable();
            $table->date('plan_expire_date')->nullable();
            $table->tinyInteger('delete_status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            //Customer
            $table->string('billing_name')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_zip')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('lang')->default('en');
            $table->text('description')->nullable();
            //End Customer
            $table->integer('company_id')->default(0);
            $table->integer('branch_id')->default(0);
            $table->rememberToken();
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('users');
    }
};
