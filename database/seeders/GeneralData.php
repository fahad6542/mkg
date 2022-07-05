<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\ProductType;
use App\Models\ClassLevels;
use App\Models\Classes;
use App\Models\Units;
use App\Models\Languages;
use App\Models\Authors;
use App\Models\Publishers;
use App\Models\Series;
use App\Models\Schools;



class GeneralData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'Primary','description'=>'K.G to Five class','position'=>1),
            array('name'=>'Middle','decription'=>'Middle Or Elementry, Five to Eight class','position'=>2),
            array('name'=>'High','decription'=>'Ninth and Tenth class','position'=>3),
            array('name'=>'Inter','decription'=>'Higher Secondary Or Intermediate, 11 to 12','position'=>4),
            array('name'=>'Graduation','decription'=>'BS, 13 to 14','position'=>5),
            array('name'=>'Master','decription'=>'15 to 16','position'=>6),
            array('name'=>'Mphil','decription'=>'17 to 18','position'=>7),
            array('name'=>'Phd','decription'=>'Doctorate','position'=>8),
        );

        ClassLevels::insert($data);

        $data = array(
            array('name'=>'1', 'level'=>'Primary', 'description'=>'One', 'position'=>4),
            array('name'=>'2', 'level'=>'Primary', 'description'=>'Two', 'position'=>5),
            array('name'=>'3', 'level'=>'Primary', 'description'=>'Three', 'position'=>6),
            array('name'=>'4', 'level'=>'Primary', 'description'=>'Four', 'position'=>7),
            array('name'=>'5', 'level'=>'Primary', 'description'=>'Five', 'position'=>8),
            array('name'=>'6', 'level'=>'Middle', 'description'=>'Six', 'position'=>9),
            array('name'=>'7', 'level'=>'Middle', 'description'=>'Seven', 'position'=>10),
            array('name'=>'8', 'level'=>'Middle', 'description'=>'Eight', 'position'=>11),
            array('name'=>'9', 'level'=>'High', 'description'=>'Ninth', 'position'=>12),
            array('name'=>'10', 'level'=>'High', 'description'=>'Tenth', 'position'=>13),
            array('name'=>'11', 'level'=>'Inter', 'description'=>'Eleven', 'position'=>14),
            array('name'=>'12', 'level'=>'Inter', 'description'=>'Twelve', 'position'=>15),
            array('name'=>'Graguation', 'level'=>'Graguation', 'description'=>'bachelors, BS, BA', 'position'=>16),
            array('name'=>'Master', 'level'=>'Master', 'description'=>'Masters MA', 'position'=>17),
            array('name'=>'Mphil', 'level'=>'Mphil', 'description'=>'MS Or Mphil', 'position'=>18),
            array('name'=>'Phd', 'level'=>'Phd', 'description'=>'Phd and Post Doctorate', 'position'=>19),
            array('name'=>'Pre Nursery', 'level'=>'Primary', 'description'=>'Pre Nursery Or Play Group Or KG', 'position'=>1),
            array('name'=>'Nursery', 'level'=>'Primary', 'description'=>'Nursery', 'position'=>2),
            array('name'=>'Prep', 'level'=>'Primary', 'description'=>'Prep', 'position'=>3)
        );

        Classes::insert($data);

        $data = array(
            array('name' => 'Books',            'description' => 'All types of Books',          'is_delete_able'=>0, 'form_type'=>'books'),
            array('name' => 'Note Books',       'description' => 'All types of Note books',     'is_delete_able'=>0, 'form_type'=>'noteBooks'),
            array('name' => 'Stationaries',     'description' => 'All types of Stationaries',   'is_delete_able'=>0, 'form_type'=>'stationaries'),
            array('name' => 'Uniforms',         'description' => 'All types of Garments',       'is_delete_able'=>0, 'form_type'=>'uniforms'),
            array('name' => 'Gift And Toys',    'description' => 'All types of Gift And Toys',  'is_delete_able'=>0, 'form_type'=>'giftAndToys'),
            array('name' => 'Others',           'description' => 'miscellaneous',               'is_delete_able'=>0, 'form_type'=>'others'),
        );

        ProductType::insert($data);

        $data = array(
            array('title' => '12 pcs Pack', 'qty' => 12, 'description' => 'Dozen'),
            array('title' => '10 pcs Pack','qty' => 10, 'description' => 'Decade'),
            // array('title' => '1 meter', 'description' => 'Weight'),
            // array('title' => 'L', 'description' => 'Volume')
        );

        Units::insert($data);

        $data = array(
            array('name' => 'Urdu','name_urdu' => 'اردو'),
            array('name' => 'English','name_urdu' => 'انگریزی'),
            array('name' => 'Arabic','name_urdu' => 'عربی'),
            array('name' => 'Chinese','name_urdu' => 'چینی'),
            array('name' => 'Saraiki','name_urdu' => 'سرائیکی'),
            array('name' => 'Punjabi','name_urdu' => 'پنجابی'),
            array('name' => 'Spanish','name_urdu' => 'ہسپانوی'),
            array('name' => 'Turkish','name_urdu' => 'ترکی'),
            array('name' => 'Persian','name_urdu' => 'فارسی'),
            array('name' => 'German','name_urdu' => 'جرمن')
        );

        Languages::insert($data);

        $data = array(
            array('name' => 'Allama Iqbal',  'sr_id' =>1,'description' => 'Shairay Mashriq', 'company_id' => 1),
            array('name' => 'Jone Alia', 'sr_id' =>2, 'description' => 'Best Poet', 'company_id' => 1),
        );

        Authors::insert($data);

        $data = array(
            array('name'=>'La Salle Higher Secondary School','name_urdu' => 'لا سالے ہائیر سیکنڈری اسکول','company_id'=>1),
            array('name'=>'Comprehensive School','name_urdu' => 'جامع سکول','company_id'=>1),
            array('name'=>'Zakria Public School','name_urdu' => 'زکریا پبلک سکول','company_id'=>1),
            array('name'=>'Nishat High School','name_urdu' => 'نشاط ہائی سکول','company_id'=>1),
            array('name'=>'Lahore Grammer School','name_urdu' => 'لاہور گرامر سکول','company_id'=>1),
        );

        Schools::insert($data);

        $data = array(
            array('name'=>'Auraq Publications','email'=>'admin@auraqpublications.com','company_id'=>1),
            array('name'=>'Oxford','email'=>'admin@oxford.com','company_id'=>1),
            array('name'=>'Gabba','email'=>'admin@gabba.com','company_id'=>1),
            array('name'=>'Bloomsbury Publishing (UK)','email'=>'admin@bloomsbury.com','company_id'=>1),
        );

        Publishers::insert($data);

        $data = array(
            array('name'=>'Easy Computer','publisher_id'=>1, 'company_id'=>1),
            array('name'=>'My First Reading Book','publisher_id'=>1, 'company_id'=>1),
            array('name'=>'New Syllabus Mathematics D1','publisher_id'=>2, 'company_id'=>1),
            array('name'=>'New Syllabus Mathematics D2','publisher_id'=>2, 'company_id'=>1),
            array('name'=>'Explorer','publisher_id'=>3, 'company_id'=>1),
        );

        $data = array(
            array('name' => 'Hary potter','name_urdu' => 'ہیری پاٹر','description'=>'Popular on Netflix','publisher_id'=>4, 'company_id'=>1 ),
            array('name' => 'Troy: Fall of a City','name_urdu' => 'ٹرائے: شہر کا زوال','description'=>'Popular on Netflix','publisher_id'=>4 ,'company_id'=>1),
            array('name' => 'Rise of Empires: Ottoman','name_urdu' => 'سلطنتوں کا عروج: عثمانی۔','description'=>'Popular on Netflix','publisher_id'=>4, 'company_id'=>1),
            array('name' => 'Chhota Bheem','name_urdu' => 'چھوٹا بھیم','description'=>'Popular on Cartoon Network','publisher_id'=>4, 'company_id'=>1),
        );


    }
}
