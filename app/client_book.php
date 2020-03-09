<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class client_book extends Model
{
    protected $fillable = ['status','cant','fk_idClient','fk_idbook'];

    function sales(int $idAuthor){


        $query = "SELECT
                cb.`status` AS `status`,
                cb.cant AS cantidad_comprada,
                cb.created_at AS fecha_compra,
                b.NAME AS nombre_libro,
                c.NAME AS comprador
            FROM
                client_books AS cb
                LEFT JOIN books b ON b.id = cb.fk_idBook
                LEFT JOIN clients c ON c.id = cb.fk_idClient
            WHERE
                cb.`status` = 'comprado'
            AND b.fk_idAutor = ".$idAuthor;

        return  collect(DB::select($query));

    }
}
