<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indice;
use Illuminate\Http\Request;

class IndiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {

            $Indexes = Indice::with('livro','subindices','pai','filhos')->get();
            return response()->json($Indexes, 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to interpret the request. Check the syntax of the submitted information."
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {


            Indice::create([
                'livro_id' => $request->livro_id,
                'indice_pai_id' => $request->indice_pai_id,
                'titulo' => $request->titulo,
                'pagina' => $request->pagina,

            ]);
            return response()->json([
                "message" => "created "
            ], 201);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to create the Indexe check the fields entered"
            ], 400);
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
        try {

            if ($Indexe = Indice::find($id)) {
                return response()->json($Indexe, 200);
            } else {
                return response()->json([
                    "message" => "Indexe not found"
                ], 404);
            }
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to interpret the request. Check the syntax of the submitted information."
            ], 400);
        }
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

        try {

            Indice::find($id)->update(
                [
                    'livro_id' => $request->livro_id,
                    'indice_pai_id' => $request->indice_pai_id,
                    'titulo' => $request->titulo,
                    'pagina' => $request->pagina,

                ]
            );
            return response()->json([
                "message" => "successfully updated Index"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to update the Indexe check the fields entered"
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Indice::find($id)->delete();
        try {

            Indice::find($id)->delete();
            return response()->json([
                "message" => "successfully deleted Index"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to delete the Indexe check the fields entered"
            ], 400);
        }
    }
}
