<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(OfferSeeder::class);
    }
}
