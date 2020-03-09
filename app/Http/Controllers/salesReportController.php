<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Exports\salesReport;


class salesReportController extends Controller
{
    function  download(Request $request){

        if(is_null($request->header('idAutor'))){

            $response = [
                'msj'   => 'no se encuetra el parametro idAutor en el header',
            ];

            return response()->json($response, 400);
        }

        try {
            $salesReport = new salesReport($request->header('idAutor'));
            return $salesReport->download('example.csv');
        } catch (\Exception $e) {

            Log::error('Ha ocurrido un error en salesReportController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de descargar el reporte.',
            ], 500);
        }

    }
}
