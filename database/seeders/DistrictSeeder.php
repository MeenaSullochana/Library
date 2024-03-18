<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
     * Run the database seeds.
     *
     * @return void
    */
        $districts = array(
            array('id' => 1,  'name' => "Ariyalur", 'state_id'=>35,'status'=>1, 'state_id'=>35,'status'=>1),
            array('id' => 2,  'name' => "Chengalpattu", 'state_id'=>35,'status'=>1),
            array('id' => 3,  'name' => "Chennai", 'state_id'=>35,'status'=>1),
            array('id' => 4,  'name' => "Coimbatore", 'state_id'=>35,'status'=>1),
            array('id' => 5,  'name' => "Cuddalore", 'state_id'=>35,'status'=>1),
            array('id' => 6,  'name' => "Dharmapuri", 'state_id'=>35,'status'=>1),
            array('id' => 7,  'name' => "Dindigul", 'state_id'=>35,'status'=>1),
            array('id' => 8,  'name' => "Erode", 'state_id'=>35,'status'=>1),
            array('id' => 9,  'name' => "Kallakurichi", 'state_id'=>35,'status'=>1),
            array('id' => 10,  'name' => "Kanchipuram", 'state_id'=>35,'status'=>1),
            array('id' => 11,  'name' => "Kanyakumari", 'state_id'=>35,'status'=>1),
            array('id' => 12,  'name' => "Karur", 'state_id'=>35,'status'=>1),
            array('id' => 13,  'name' => "Krishnagiri", 'state_id'=>35,'status'=>1),
            array('id' => 14,  'name' => "Madurai", 'state_id'=>35,'status'=>1),
            array('id' => 15,  'name' => "Mayiladuthurai", 'state_id'=>35,'status'=>1),
            array('id' => 16,  'name' => "Nagapattinam", 'state_id'=>35,'status'=>1),
            array('id' => 17,  'name' => "Namakkal", 'state_id'=>35,'status'=>1),
            array('id' => 18,  'name' => "Nilgiris", 'state_id'=>35,'status'=>1),
            array('id' => 19,  'name' => "Perambalur", 'state_id'=>35,'status'=>1),
            array('id' => 20,  'name' => "Pudukkottai", 'state_id'=>35,'status'=>1),
            array('id' => 21,  'name' => "Ramanathapuram", 'state_id'=>35,'status'=>1),
            array('id' => 22,  'name' => "Ranipet", 'state_id'=>35,'status'=>1),
            array('id' => 23,  'name' => "Salem", 'state_id'=>35,'status'=>1),
            array('id' => 24,  'name' => "Sivaganga", 'state_id'=>35,'status'=>1),
            array('id' => 25,  'name' => "Tenkasi", 'state_id'=>35,'status'=>1),
            array('id' => 26,  'name' => "Thanjavur", 'state_id'=>35,'status'=>1),
            array('id' => 27,  'name' => "Theni", 'state_id'=>35,'status'=>1),
            array('id' => 28,  'name' => "Thoothukudi", 'state_id'=>35,'status'=>1),
            array('id' => 29,  'name' => "Tiruchirappalli", 'state_id'=>35,'status'=>1),
            array('id' => 30,  'name' => "Tirunelveli", 'state_id'=>35,'status'=>1),
            array('id' => 31,  'name' => "Tirupattur", 'state_id'=>35,'status'=>1),
            array('id' => 32,  'name' => "Tiruppur", 'state_id'=>35,'status'=>1),
            array('id' => 33,  'name' => "Tiruvallur", 'state_id'=>35,'status'=>1),
            array('id' => 34,  'name' => "Tiruvannamalai", 'state_id'=>35,'status'=>1),
            array('id' => 35,  'name' => "Tiruvarur", 'state_id'=>35,'status'=>1),
            array('id' => 36,  'name' => "Vellore", 'state_id'=>35,'status'=>1),
            array('id' => 37,  'name' => "Viluppuram", 'state_id'=>35,'status'=>1),
            array('id' => 38,  'name' => "Virudhunagar", 'state_id'=>35,'status'=>1),
        );

        DB::table('districts')->insert($districts);

    }
}
