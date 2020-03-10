<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Exports\salesReport;


class salesReportController extends Controller
{
    function  download(Request $request){

        try {

            return (new salesReport($request))->download('example.csv');

        } catch (\Exception $e) {

            Log::error('Ha ocurrido un error en salesReportController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de descargar el reporte.',
            ], 500);
        }

    }
}
