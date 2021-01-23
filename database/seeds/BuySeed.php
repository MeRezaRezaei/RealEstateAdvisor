<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('buys')->insert(
            [
                'buy_id'=>1,
                'buy_type'=>'App\Land',
                'price'=>100000,
                'property'=>2,
                'deal'=>2,
            ]
        );
        DB::table('buys')->insert(
            [
                'buy_id'=>2,
                'buy_type'=>'App\Land',
                'price'=>1000000,
                'property'=>3,
                'deal'=>1,
            ]
        );
    }
}
