<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class book extends Model
{
    protected $fillable = ['name','cant','fk_idAutor','price'];

    public function updateCant(object $book, int $sell)
    {
        return   DB::table('books')
                ->where('id', '=', $book->id)
                ->update(['cant' => $book->cant - $sell]);
    }


}
