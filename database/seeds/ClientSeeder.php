<?php

use Illuminate\Database\Seeder;
use App\client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        client::create([
            'name' => 'maria',
            'surname' => 'perez',
            'email' => 'maria@hotmail.com',
            'wallet' => 500,
        ]);
    }
}
