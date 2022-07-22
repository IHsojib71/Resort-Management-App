<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resorts =[
            ['id'=>1,'title'=>'Crowne Plaza','amount'=>850,'details'=>'Crowne Plaza details','image'=>'1.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>2,'title'=>'Emerald Bay Inn','amount'=>1050,'details'=>'Emerald Bay Inn details','image'=>'2.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>3,'title'=>'Hotel Bliss','amount'=>650,'details'=>'Hotel Bliss details','image'=>'3.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>4,'title'=>'The New View','amount'=>1250,'details'=>'The New View details','image'=>'4.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>5,'title'=>'Sunset Lodge','amount'=>1450,'details'=>'Sunset Lodge Resort 5 details','image'=>'5.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>6,'title'=>'Hotel Elite','amount'=>1850,'details'=>'Hotel Elite details','image'=>'6.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>7,'title'=>'Nishiyama Onsen','amount'=>2050,'details'=>'Nishiyama Onsen details','image'=>'7.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()],
            ['id'=>8,'title'=>'Sky City Horizon','amount'=>1650,'details'=>'Sky City Horizon details','image'=>'8.jpg','created_at' => Carbon::now(),'updated_at'=>Carbon::now()]

            ];
    
            Resort::insert($resorts);
    }
}
