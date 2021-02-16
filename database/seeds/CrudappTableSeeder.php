<?php

use Illuminate\Database\Seeder;
use App\Crudapp;

class CrudappTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Crudapps = new Crudapp();
        $Crudapps->CrudappsName = 'Wclient';
        $Crudapps->CrudappsDescription = 'Khách hàng CN';
        $Crudapps->save();
    }
}
