<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client_book;
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

        $info = [
            'cant'       => $request->get('cant'),
            'fk_idClient' => $request->get('idClient'),
            'fk_idbook' => $request->get('idBook'),
            'status' => $request->get('status'),
        ];


        try {
            $reservation = new client_book($info);
            $reservation->save();

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
