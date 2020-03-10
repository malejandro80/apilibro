<?php

use Illuminate\Database\Seeder;
use App\offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        offer::create([
            'name' => 'oferton',
            'cant' => 10,
            'fk_idBook' => 1,
            'percent' => 15,
            'end_offer' => '2020-03-18 23:31:37',
        ]);
    }
}
