<?php
use App\book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        book::create([
            'name' => 'libro de prueba',
            'cant' => 100,
            'fk_idAutor' => 1,
            'price' => 150,

        ]);
    }
}
