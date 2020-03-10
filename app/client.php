<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\book;
use Illuminate\Support\Facades\DB;

class client extends Model
{
    function getClientsByAuthor(int $idAutor){


        $query = "SELECT
                    clients.*
                FROM
                    client_books
                    JOIN books ON books.id = client_books.fk_idBook
                    LEFT JOIN clients ON clients.id = client_books.fk_idClient
                WHERE
                    books.fk_idAutor = ".$idAutor."
                GROUP BY clients.id";


        return  collect(DB::select($query));

    }
    function books() {
        return $this->belongsToMany('App\book', 'client_books', 'fk_idClient', 'fk_idBook');
    }
}
