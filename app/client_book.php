<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class client_book extends Model
{
    protected $fillable = ['status',
                           'cant',
                           'fk_idClient',
                           'fk_idbook',
                           'amount',
                           'offer_percent'];

    function sales(int $idAuthor,string $desde,string $hasta, string $status)
    {


        $query = "SELECT
                cb.`status` AS `status`,
                cb.cant AS cantidad_comprada,
                cb.created_at AS fecha_compra,
                cb.offer_percent as porcentaje_oferta,
				cb.amount as total_pagar,
                b.name AS nombre_libro,
                c.name AS comprador
            FROM
                client_books AS cb
                LEFT JOIN books b ON b.id = cb.fk_idBook
                LEFT JOIN clients c ON c.id = cb.fk_idClient
            WHERE
                cb.`status` = '".$status."'
            AND b.fk_idAutor = ".$idAuthor."
            AND date(cb.created_at) BETWEEN '".$desde."' and '".$hasta."'";

   
        return  collect(DB::select($query));

    }
}
