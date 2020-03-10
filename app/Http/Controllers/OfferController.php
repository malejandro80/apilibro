<?php

namespace App\Http\Controllers;

use App\offer;
use Illuminate\Http\Request;
use App\Http\Requests\offerRequest;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
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
    public function store(offerRequest $request)
    {
        $info = [
            'cant'       => $request->get('cant'),
            'name'       => $request->get('name'),
            'fk_idbook'  => $request->get('idBook'),
            'percent'    => $request->get('percent'),
            'end_offer'   => $request->get('endOffer'),
        ];


        try {
            (new offer($info))->save();

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
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(offer $offer)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(offer $offer)
    {
        //
    }
}
