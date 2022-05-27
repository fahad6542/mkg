<?php

namespace Database\Seeders;

// use App\User;
use App\Utility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Companies;
use App\Models\Branches;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///user roles
        ////////////////////////////////super admin/////////////
        $arrPermissions = [
            'show dashboard',
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'create permission',
            'edit permission',
            'delete permission',
            'manage company settings',
            'manage plan',
            'create plan',
            'edit plan',
            'manage customer payment',
            'manage customer transaction',
            'manage customer invoice',
            'show invoice',
            'show proposal',
            'manage customer proposal',
            'show customer',
            'vender manage bill',
            'manage vender bill',
            'manage vender payment',
            'manage vender transaction',
            'show vender',
            'show bill',
            'manage business settings',
            'manage expense',
            'create expense',
            'edit expense',
            'delete expense',

        ];

        foreach($arrPermissions as $ap)
        {
            Permission::create(['name' => $ap]);
        }

        // Super admin

        $superAdminRole      = Role::create(
            [
                'name'       => 'super admin',
                'created_by' => 0,
                'prefix'     =>'superadmin'
            ]
        );
        $superAdminPermissions = [
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'create permission',
            'edit permission',
            'delete permission',
            'manage plan',
            'create plan',
            'edit plan',
        ];
        foreach($superAdminPermissions as $ap)
        {
            $permission = Permission::findByName($ap);
            $superAdminRole->givePermissionTo($permission);
        }

         // customer
         $walkInCustomerRole       = Role::create(
            [
                'name' => 'walk in customer',
                'created_by' => 0,
                'prefix' => 'wicustomer'
            ]
        );

        // customer
        $customerRole       = Role::create(
            [
                'name' => 'customer',
                'created_by' => 0,
                'prefix'    =>  'customer'
            ]
        );
        $customerPermission = [
            'manage customer payment',
            'manage customer transaction',
            'manage customer invoice',
            'show invoice',
            'show proposal',
            'manage customer proposal',
            'show customer',
        ];

        foreach($customerPermission as $ap)
        {
            $permission = Permission::findByName($ap);
            $customerRole->givePermissionTo($permission);
        }

        // vender
        $venderRole       = Role::create(
            [
                'name' => 'vender',
                'created_by' => 0,
                'prefix'    => 'vender'
            ]
        );
        $venderPermission = [
            'vender manage bill',
            'manage vender bill',
            'manage vender payment',
            'manage vender transaction',
            'show vender',
            'show bill',
        ];

        foreach($venderPermission as $ap)
        {
            $permission = Permission::findByName($ap);
            $venderRole->givePermissionTo($permission);
        }


        // company

        $companyRole        = Role::create(
            [
                'name' => 'company',
                'created_by' => 1,
                'prefix' => 'company'
            ]
        );
        $companyPermissions = [
            'show dashboard',
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'create permission',
            'edit permission',
            'delete permission',
            'manage company settings',
            'manage business settings',
        ];

        foreach($companyPermissions as $ap)
        {
            $permission = Permission::findByName($ap);
            $companyRole->givePermissionTo($permission);
        }


////////////////////////////////branch admin/////////////
        $branchRole        = Role::create(
            [
                'name' => 'branch',
                'created_by' => 1,
                'prefix' => 'branch'
            ]
        );
        $branchPermissions = [
            'show dashboard',
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage role',
        ];

        foreach($branchPermissions as $ap)
        {
            $permission = Permission::findByName($ap);
            $branchRole->givePermissionTo($permission);
        }

///////////////////////////////////////accountatnt
 // accountant
 $accountantRole     = Role::create(
    [
        'name'       => 'accountant',
        'created_by' => 1,
        'prefix'     =>'accountant'
    ]
);
$accountantPermission = [
    'show dashboard',
    'manage expense',
    'create expense',
    'edit expense',
    'delete expense',
];

foreach($accountantPermission as $ap)
{
    $permission = Permission::findByName($ap);
    $accountantRole->givePermissionTo($permission);
}

//////////////////////////////////////Adding Users//////////////////
        $superAdmin = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@mkg.com',
                'password' => Hash::make('12345'),
                'type' => 'super admin',
                'lang' => 'en',
                'created_by' => 0,
            ]
        );
        $superAdmin->assignRole($superAdminRole);


        $company_mkg = Companies::create(
            [
                'name' => 'Multan Kitab Ghr',
                'name_urdu' =>  'ملتان کتاب گھر',
                'contact' => '0312456528',
                'address' =>'Ghanta Ghr Multan'
            ]
        );

        $comapny_admin = User::create(
            [
                'name' => 'MKG Admin',
                'email' => 'mkgdmin@mkg.com',
                'password' => Hash::make('12345'),
                'type' => 'company',
                'contact' => '03156026687',
                'avatar' => '',
                'company_id' => $company_mkg->id,
                'branch_id' => 0,
                'created_by' => $superAdmin->id,
            ]
        );
        $comapny_admin->assignRole($companyRole);


        //Step1
        $branch_1 = Branches::create(
            [
                'name' => 'Multan Kitab Ghar (Ghanta Ghar)',
                'name_urdu' =>  'ملتان کتاب گھر گھنٹہ گھر',
                'sr_id' => 1,
                'contact' => '03116027781',
                'address' =>'Ghanta Ghr Multan',
                'company_id' => $company_mkg->id
            ]
        );
        $branchAdmin = User::create(
            [
                'name' => 'Branch 1 Admin',
                'email' => 'mkgbranch1dmin@mkg.com',
                'password' => Hash::make('12345'),
                'type' => 'branch',
                'contact' => '03156026687',
                'company_id' => $company_mkg->id,
                'branch_id' => $branch_1->id,
                'created_by' => 0,
            ]
        );
        $branchAdmin->assignRole($branchRole);

        $walk_in_customer = User::create([
            'name' => 'Walk In Customer',
            'email' => 'walkincustomer@branch1.com',
            'password' => Hash::make('12345'),
            'type' => 'walk in customer',
            'contact' => '03156026687',
            'company_id' => $company_mkg->id,
            'branch_id' => $branch_1->id,
            'created_by' => 0,
        ]);
        $walk_in_customer->assignRole($walkInCustomerRole);

        $branch_2 = Branches::create(
            [
                'name' => 'Multan Kitab Ghar Gulgasht',
                'name_urdu' =>  'ملتان کتاب گھر گلگشت',
                'sr_id' => 2,
                'contact' => '03226027782',
                'address' =>'Goal Bagh Bosan Road Multan',
                'company_id' => $company_mkg->id
            ]
        );
        $branchAdmin = User::create(
            [
                'name' => 'Branch 2 Admin',
                'email' => 'mkgbranch2dmin@mkg.com',
                'password' => Hash::make('12345'),
                'type' => 'branch',
                'contact' => '03156026687',
                'company_id' => $company_mkg->id,
                'branch_id' => $branch_2->id,
                'created_by' => 0,
            ]
        );
        $branchAdmin->assignRole($branchRole);
        $walk_in_customer = User::create([
            'name' => 'Walk In Customer',
            'email' => 'walkincustomer@branch2.com',
            'password' => Hash::make('12345'),
            'type' => 'walk in customer',
            'contact' => '03156026687',
            'company_id' => $company_mkg->id,
            'branch_id' => $branch_2->id,
            'created_by' => 0,
        ]);
        $walk_in_customer->assignRole($walkInCustomerRole);

        $branch_3 = Branches::create(
            [
                'name' => 'Multan Kitab Ghr Cantt',
                'name_urdu' =>  'ملتان کتاب گھر کینٹ',
                'sr_id' => 3,
                'contact' => '03336027783',
                'address' =>'Goal Bagh Bosan Road Multan',
                'company_id' => $company_mkg->id
            ]
        );
        $branchAdmin = User::create(
            [
                'name' => 'Branch 3 Admin',
                'email' => 'mkgbranch3dmin@mkg.com',
                'password' => Hash::make('12345'),
                'type' => 'branch',
                'contact' => '03156026687',
                'company_id' => $company_mkg->id,
                'branch_id' => $branch_3->id,
                'created_by' => 0,
            ]
        );
        $branchAdmin->assignRole($branchRole);
        $walk_in_customer = User::create([
            'name' => 'Walk In Customer',
            'email' => 'walkincustomer@branch3.com',
            'password' => Hash::make('12345'),
            'type' => 'walk in customer',
            'contact' => '03156026687',
            'company_id' => $company_mkg->id,
            'branch_id' => $branch_3->id,
            'created_by' => 0,
        ]);
        $walk_in_customer->assignRole($walkInCustomerRole);

        $accountant = User::create(
            [
                'name' => 'accountant',
                'email' => 'accountant@example.com',
                'password' => Hash::make('1234'),
                'type' => 'accountant',
                'lang' => 'en',
                'avatar' => '',
                'created_by' => $company_mkg->id,
            ]
        );
        $accountant->assignRole($accountantRole);

        // \App\BankAccount::create(
        //     [
        //         'holder_name' => 'Cash',
        //         'bank_name' => '',
        //         'account_number' => '-',
        //         'opening_balance' => '0.00',
        //         'contact_number' => '-',
        //         'bank_address' => '-',
        //         'created_by' => $company->id,
        //     ]
        // );

        // Utility::chartOfAccountTypeData();
        // Utility::chartOfAccountData($company);
    }
}
