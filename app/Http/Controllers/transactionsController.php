<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\author;
use App\client_book;
use Illuminate\Support\Facades\Log;

class transactionsController extends Controller
{
    public function balance(Request $request){

        try {
                if($request->header('person') === 'client'){
                  $query = client::find($request->header('id'));
                }
                else if($request->header('person') === 'author'){
                   $query = author::find($request->header('id'));
                }

                 $response = [
                    'name'   => $query->name,
                    'balance'   => $query->wallet,
                ];
                 return response()->json($response, 200);


        } catch (\Exception $e) {

            Log::error('Ha ocurrido un error en transactionsController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al realizar la consullta',
            ], 500);
        }

    }

     public function sales(Request $r){

         try {

          $sales = (new client_book())->sales( $r->header('id'),$r->header('desde'),$r->header('hasta'), $r->header('status'));

                 return response()->json($sales, 200);


        } catch (\Exception $e) {

            Log::error('Ha ocurrido un error en transactionsController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al realizar la consullta',
            ], 500);
        }


    }
}
