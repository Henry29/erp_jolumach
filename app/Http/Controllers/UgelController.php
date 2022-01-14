<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;
use Throwable;

class UgelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        DB::beginTransaction();

        try {
            $ugel = DB::select('SELECT pa_listarugel()');
            $cursor = $ugel[0]->pa_listarugel;
            $cursor_data = DB::select('FETCH ALL IN "' . $cursor . '";');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        return $cursor_data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idugel = $request->editedItem["idugel"];
        $descripcion = $request->editedItem["descripcion"];
        $direccion = $request->editedItem["direccion"];
        $codubi = $request->editedItem["codubi"];
        $codempresa = $request->editedItem["codempresa"];
        $coddes = $request->editedItem["coddes"];
        $estado = $request->editedItem["estado"];

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_mantenimientougel(:idugel,:descripcion,:direccion,:codubi,:codempresa,:coddes,:estado)',
                ['idugel' => $idugel, 'descripcion' => $descripcion, 'direccion' => $direccion, 'codubi' => $codubi, 'codempresa' => $codempresa,'coddes' => $coddes,'estado' => $estado]
            );
            $cursor = $save[0]->pa_mantenimientougel;
            $cursor_data = DB::select('FETCH ALL IN "' . $cursor . '";');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        return response()->json($cursor_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\typeDocumentIdentify  $typeDocumentIdentify
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\typeDocumentIdentify  $typeDocumentIdentify
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\typeDocumentIdentify  $typeDocumentIdentify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\typeDocumentIdentify  $typeDocumentIdentify
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idugel = $request->id;

        DB::beginTransaction();

        try {
            $delete = DB::delete('DELETE FROM tbugel WHERE idugel=:idugel', ['idugel' => $idugel]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        return response()->json($delete);
    }
}
