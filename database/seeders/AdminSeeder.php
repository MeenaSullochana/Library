<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {DB::table("admins")->insert([
            'id'=>"kfdds-sdsdwsd-sdsdsds_tftydt",
            'name'=>"admin",
            'email'=>"admin@gmail.com",
            'password'=>Hash::make('admin123'),
            'role'=>"admin",
            "mobileNumber"=>'1234567890',
            "adminImage"=>'Abishek1699419725.png',
        ]
        );
    }
    }
}
