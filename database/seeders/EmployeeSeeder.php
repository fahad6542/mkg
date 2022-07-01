<?php

namespace Database\Seeders;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'email'              => 'admin@gmail.com',
            'password'           => Hash::make('12345'),
            'code'               => 1,
            'branch_code'        => 041,
            'account_number'     => 04123,
            'name'               =>'Saad',
            'urdu_name'          =>'سعد',
            'father_name'        => 'Sajid',
            'department'         =>       1,
            'branch_id'          =>       1,
            'staff_group'        =>       1,
            'designation'        =>       1,
            'designation_urdu'   =>       1,
            'validity_Date'      =>   '2022-06-15',
            'birth_date'         =>    '1998-06-11',
            'hire_date'          =>    '2021-06-19',
            'spo'                =>       1,
            'address'            => 'Rasheedabad Chowk National colony Multan',
            'address_urdu'       => 'رشید آباد چوک نیشنل کالونی ملتان',
            'city'               => 'Multan',
            'country'            => 'Pakistan',
            'home_phone_no'      => 03137405631,
            'mobile_no'          => 03137405631,
            'nic'                => 3630235245675,
            'remarks'            => 'Good',
            'resign_date'        =>  '2022-04-15',
            'salaried_emp'       => 1,
            'salary_type'        => 0,
            'monthly_salary'     => 40000,
            'daily_works_hours'  => 9,
            'over_time_hours'    => 2,
            'loan_payable'       => 2500,
            'advance_salary'     => 35000,
            'loan_installment'   => 5,
            'exp_salary_payable' => 30000,
             'shift_time_in'          => '8:5:15',
             'shift_time_out'         => '17:15:35',
             'early_relaxation_time'  => '10',
             'late_relaxation_time'   => '5',
 

        ]);




        Employee::create([
            'email'              => 'taha378@gmail.com',
            'password'           => Hash::make('12345'),
            'code'               => 1,
            'branch_code'        => 042,
            'account_number'     => 04123,
            'name'               =>'Taha',
            'urdu_name'          =>'طحہ',
            'father_name'        => 'Ali',
            'department'         =>       2,
            'branch_id'          =>       2,
            'staff_group'        =>       1,
            'designation'        =>       2,
            'designation_urdu'   =>       2,
            'validity_Date'      =>    '2022-06-12',
            'birth_date'         =>    '1999-02-21',
            'hire_date'          =>    '2021-07-22',
            'spo'                =>       1,
            'address'            => 'Gulgsdht colony Multan',
            'address_urdu'       => 'گلگشت کالونی ملتان',
            'city'               => 'Multan',
            'country'            => 'Pakistan',
            'home_phone_no'      => 03132345322,
            'mobile_no'          => 031374235631,
            'nic'                => 3630235245675,
            'remarks'            => 'Good',
            'resign_date'        =>  '2022-04-15',
            'salaried_emp'       => 1,
            'salary_type'        => 0,
            'monthly_salary'     => 30000,
            'daily_works_hours'  => 9,
            'over_time_hours'    => 2,
            'loan_payable'       => 3500,
            'advance_salary'     => 22000,
            'loan_installment'   => 2,
            'exp_salary_payable' => 4000,
             'shift_time_in'          =>   '8:5:15',
             'shift_time_out'         =>  '17:15:35',
             'early_relaxation_time'  =>  '5',
             'late_relaxation_time'   =>  '15',
 

        ]);



        Employee::create([
            'email'              => 'Ali32@gmail.com',
            'password'           => Hash::make('12345'),
            'code'               => 1,
            'branch_code'        => 042,
            'account_number'     => 04123,
            'name'               =>'Ali',
            'urdu_name'          =>'علی',
            'father_name'        => 'Imran',
            'department'         =>       2,
            'branch_id'          =>       2,
            'staff_group'        =>       1,
            'designation'        =>       1,
            'designation_urdu'   =>       1,
            'validity_Date'      =>    '2022-06-12',
            'birth_date'         =>    '1997-05-21',
            'hire_date'          =>    '2020-03-22',
            'spo'                =>       1,
            'address'            => 'Gulgsdht colony Multan',
            'address_urdu'       => 'گلگشت کالونی ملتان',
            'city'               => 'Multan',
            'country'            => 'Pakistan',
            'home_phone_no'      => 03142345377,
            'mobile_no'          => 031474235641,
            'nic'                => 3630535645675,
            'remarks'            => 'Good',
            'resign_date'        =>  '2022-05-25',
            'salaried_emp'       => 1,
            'salary_type'        => 0,
            'monthly_salary'     => 50000,
            'daily_works_hours'  => 9,
            'over_time_hours'    => 2,
            'loan_payable'       => 6500,
            'advance_salary'     => 42000,
            'loan_installment'   => 2,
            'exp_salary_payable' => 50000,
             'shift_time_in'     =>      '12:15:16',
             'shift_time_out'         => '17:15:35',
             'early_relaxation_time'  => '5',
             'late_relaxation_time'   => '10',
 

        ]);
    }



    
}
