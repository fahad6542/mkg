<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Companies;
use App\Models\Branches;
use App\Models\Locations;

class SampleData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Companies::create(
            [
                'name' => 'New Books & Books',
                'name_urdu' =>  'ملتان',
                'contact' => '(061) 6511828',
                'address' =>'Goal Bagh Multan'
            ]
        );

        $company = Companies::create(
            [
                'name' => 'The Read School Shop',
                'name_urdu' =>  'ملتان',
                'contact' => '(061) 6222205',
                'address' =>'Near Zavia School'
            ]
        );


        $comapnyAdmin = User::create(
            [
                'name' => 'Books and Books Admin',
                'email' => 'booksandbooks@mkg.com',
                'password' => Hash::make('12345'),
                'contact' => '6511828',
                'type' => 'company',
                'avatar' => '',
                'company_id' => $company->id,
                'branch_id' => 0,
                'created_by' => 0,
            ]
        );

        $branch_1 = Branches::create(
            [
                'name' => 'New Books & Books',
                'name_urdu' =>  'ملتان',
                'sr_id' => 1,
                'contact' => '03116027781',
                'address' =>'Goal Bagh Multan',
                'company_id' => $company->id
            ]
        );

        $branchAdmin = User::create(
            [
                'name' => 'Branch 1 Admin',
                'email' => 'mkgbranch1dmin@mkg.com',
                'password' => Hash::make('12345'),
                'contact' => '03156026687',
                'role_id' => 3,
                'company_id' => $company->id,
                'branch_id' => $branch_1->id,
                'created_by' => 0,
            ]
        );

        $data = array(
            array('sr_id' => 1, 'name' => 'Front counter', 'branch_id'=>1),
            array('sr_id' => 2, 'name' => 'Shelf A2', 'branch_id'=>1),
            array('sr_id' => 3, 'name' => 'Shelf A3', 'branch_id'=>1),
            array('sr_id' => 4, 'name' => 'Shelf B2', 'branch_id'=>1),

            array('sr_id' => 1, 'name' => 'Cash counter', 'branch_id'=>2),
            array('sr_id' => 2, 'name' => 'Cabin 402', 'branch_id'=>2),
            array('sr_id' => 3, 'name' => 'Cabin 311', 'branch_id'=>2),
            array('sr_id' => 4, 'name' => 'Cabin 322', 'branch_id'=>2),
        );

        Locations::insert($data);

    }
}
