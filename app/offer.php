<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class offer extends Model
{
     protected $fillable = ['cant',
                            'name',
                            'fk_idbook',
                            'percent',
                            'end_offer'];

    public function getOfferBook($idBook){

        $currentDate = date("Y-m-d",getDate()[0]);

        return DB::table('offers')
                ->where('fk_idBook', '=', $idBook)
                ->where('end_offer', '>=', $currentDate)
                ->first() ;
    }

    public function updateOffer(object $offer,int $sell){

        return  DB::table('offers')
                    ->where('id', '=', $offer->id)
                    ->update(['cant' => $offer->cant - $sell]);

    }
}
