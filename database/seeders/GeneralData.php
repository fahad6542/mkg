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
            array('name' => 'Books','description' => 'All types of books'),
            array('name' => 'Note Books','description' => 'All types of note books'),
            array('name' => 'Stationeries','description' => 'All types of stationeries'),
            array('name' => 'Uniform','description' => 'All types of Garments'),
            array('name' => 'Others','description' => 'miscellaneous'),
        );

        ProductType::insert($data);

        $data = array(
            array('title' => 'Piece','short_name' => 'pcs', 'description' => 'Per Piece'),
            array('title' => 'Meter','short_name' => 'm', 'description' => 'Length'),
            array('title' => 'Kilogram','short_name' => 'Kg', 'description' => 'Weight'),
            array('title' => 'Liter','short_name' => 'L', 'description' => 'Volume')
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

        // $data = array(
        //     array('name' => 'Jone Alia', 'sr_id' =>1, 'description' => 'Best Poet'),
        //     array('name' => 'Allama Iqbal',  'sr_id' =>2,'description' => 'Shairay Mashriq'),
        // );

        // Authors::insert($data);




    }
}