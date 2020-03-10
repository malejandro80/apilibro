<?php

namespace App\Http\Controllers;
use App\Events\sucessfullReservation;
use Illuminate\Http\Request;
use App\client_book;
use App\book;
use App\offer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\reservationRequest;

class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(reservationRequest $request)
    {
        $book =book::find($request->get('idBook'));
        if($book->cant == 0){
            $response = [
                'msj'   => 'libro agotado',
            ];

            return response()->json($response, 200);
        }

        $info = [
            'cant'       => $request->get('cant'),
            'fk_idClient' => $request->get('idClient'),
            'fk_idbook' => $request->get('idBook'),
            'status' => $request->get('status'),
            'amount' => $book->price*$request->get('cant')
        ];

        try {

            $offer = new offer();
            $coupon = $offer->getOfferBook($info['fk_idbook']);

            if($coupon->cant > 0){
                $offer->updateOffer($coupon, $info['cant']);

                $info['amount'] -= $info['amount']*$coupon->percent/100;
                $info['offer_percent'] = $coupon->percent;
            }

            (new book())->updateCant( $book, $info['cant']);
            (new client_book($info))->save();

            event(new sucessfullReservation($book->fk_idAutor));


            $response = [
                'msj'   => 'Reservacion hecha exitosamente',
            ];

            return response()->json($response, 200);


        } catch (\Exception $e) {

            Log::error('Ha ocurrido un error en reservationController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
