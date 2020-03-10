<?php
use App\author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        author::create([
            'name' => 'jesus',
            'surname' => 'martinez',
            'email' => 'prueba@hotmail.com',
            'wallet' => 500,
        ]);

    }
}
