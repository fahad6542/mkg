<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_salaries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('employee_id');
            $table->float('monthly_salary');
            $table->float('prevous_advance_salary');
            $table->float('exp_loan_repay');
            $table->float('exp_bal_sal_of_month');
            $table->float('new_advance');
            $table->float('new_exp_bal_sal_of_month');
            $table->text('remarks');
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
        Schema::dropIfExists('advance_salaries');
    }
}
