<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();


            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->String('code');
            $table->String('branch_code')->nullable();
            $table->String('account_number')->nullable();
            $table->String('name');
            $table->String('urdu_name')->nullable();
            $table->String('father_name')->nullable();
            $table->Integer('department')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->Integer('staff_group')->nullable();
            $table->Integer('designation')->nullable();
            $table->Integer('designation_urdu')->nullable();

          

            $table->date('validity_Date')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('hire_date')->nullable();
            $table->Integer('spo')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address_urdu')->nullable();
            $table->String('city')->nullable();
            $table->String('country')->nullable();
            $table->String('home_phone_no')->nullable();
            $table->String('mobile_no')->nullable();
            $table->String('nic')->nullable();
            $table->String('remarks')->nullable();
            $table->date('resign_date')->nullable();
            $table->tinyInteger('salaried_emp')->default(0);
            $table->String('salary_type')->nullable();
            $table->String('monthly_salary')->nullable();
            $table->String('daily_works_hours')->nullable();
            $table->String('over_time_hours')->nullable();
            $table->String('loan_payable')->nullable();
            $table->String('advance_salary')->nullable();
            $table->String('loan_installment')->nullable();
            $table->String('exp_salary_payable')->nullable();
            $table->time('shift_time_in')->nullable();
            $table->time('shift_time_out')->nullable();
            $table->tinyInteger('early_relaxation_time')->nullable();
            $table->tinyInteger('late_relaxation_time')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
