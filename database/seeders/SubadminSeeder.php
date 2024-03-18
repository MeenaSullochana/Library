<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class SubadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {DB::table("sub_admins")->insert([
            'id'=>"dfgt-grfgfg-gdgsd-sdgsd-dsgd",
            'name'=>"subadmin",
            'userName'=>"ad123",
            'designation'=>"officer",
            'address'=>"northstreet",
            'district'=>"dindigul",
            'email'=>"subadmin@gmail.com",
            'password'=>Hash::make('subadmin123'),
            'role'=>"subadmin",
            "mobileNumber"=>'1234567890',
            "postalCode"=>'123456',
            "createdBy"=>"kfdds-sdsdwsd-sdsdsds_tftydt",
           "subadminImage"=>"shek1698846252.png"
        ]
        );
    }
    }
}