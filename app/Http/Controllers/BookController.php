<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Book::get(), 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'cant'       => 'required',
            'fk_idAutor' => 'required',
        ], [
            'name.required'       => 'El Campo es requerido',
            'cant.required'       => 'El Campo es requerido',
            'fk_idAutor.required' => 'El Campo es requerido',

        ]);




        try {
            $book = new book($request->all());
            $book->save();

            $response = [
                'msj'   => 'Libro guardado exitosamente',
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {

            Log::error('Ha ocurrido un error en BookController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        try {
            $book->update($request->all());

            Log::error('Ha ocurrido un error en BookController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

             $response = [
                'msj'   => 'Libro editado exitosamente',
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de editar los datos.',
            ], 500);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();

        $response = [
            'msj'   => 'Libro eliminado',
        ];

            return response()->json($response, 200);
    }
}
