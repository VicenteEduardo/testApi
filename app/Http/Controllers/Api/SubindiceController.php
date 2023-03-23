<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subindice;
use Illuminate\Http\Request;

class SubindiceController extends Controller
{
    public function index()
    {

        try {

            $Subindice = Subindice::with('indice')->get();
            return response()->json($Subindice, 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to interpret the request. Check the syntax of the submitted information."
            ], 400);
        }
    }

    public function store(Request $request)
    {

        try {


           Subindice::create([
                'indice_id' => $request->indice_id,
                'titulo' => $request->titulo,
                'pagina' => $request->pagina,

            ]);
            return response()->json([
                "message" => "created "
            ], 201);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to create the Subindice check the fields entered"
            ], 400);
        }
    }


    public function show($id)
    {

        try {

            if ($Subindice = Subindice::with('indice')->find($id)) {
                return response()->json($Subindice, 200);
            } else {
                return response()->json([
                    "message" => "Subindice not found"
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

            Subindice::find($id)->update([
                'indice_id' => $request->indice_id,
                'titulo' => $request->titulo,
                'pagina' => $request->pagina,
            ]);

            return response()->json([
                "message" => "successfully updated Subindice"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to update the Subindice check the fields entered"
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

            Subindice::find($id)->delete();
            return response()->json([
                "message" => "
                successfully deleted Subindice"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "error when trying to delete the Subindice check the fields entered"
            ], 400);
        }
    }
}
