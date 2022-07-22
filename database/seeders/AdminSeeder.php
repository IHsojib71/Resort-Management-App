<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123');
        $admins =[
        ['id'=>1,'name'=>'Admin','email'=>'admin@gmail.com','password'=>$password,'created_at' => Carbon::now(),'updated_at'=>Carbon::now()]
    
        ];

        Admin::insert($admins);
    }
}
