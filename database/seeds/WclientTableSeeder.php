<?php

use Illuminate\Database\Seeder;
use App\Wclient;

class WclientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $wclient = new Wclient();
        $wclient->WclientsName = 'Kyocera';
        $wclient->WclientsCode = 'KYO';
        $wclient->save();
    }
}
