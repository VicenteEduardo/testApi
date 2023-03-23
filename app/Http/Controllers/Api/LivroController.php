<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $livros = Livro::with(['usuario', 'indices.subindices'])->get();

            return response()->json($livros, 200);
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

            $Livro = Livro::create([
                'titulo' => $request->titulo,
                'usuario_publicador_id' => auth()->user()->id,
            ]);


            return response()->json([
                "message" => "successfully created"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to create the book check the fields entered"
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

            if ($Livro = Livro::with(['usuario', 'indices.subindices'])->find($id)) {
                return response()->json($Livro, 200);
            } else {
                return response()->json([
                    "message" => "book not found"
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

            Livro::find($id)->update([
                'titulo' => $request->titulo,

            ]);
            return response()->json([
                "message" => "successfully updated book"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to update the book check the fields entered"
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
        try {

            Livro::find($id)->delete();
            return response()->json([
                "message" => "successfully deleted book"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to delete the book check the fields entered"
            ], 400);
        }
    }
}
