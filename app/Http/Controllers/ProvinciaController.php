<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;
use Throwable;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $iddep = $request->id;

        DB::beginTransaction();

        try {
            $provincias = DB::select(
                'SELECT pa_listarprovinciam(:iddep)',
                ['iddep' => $iddep]
            );
            $cursor = $provincias[0]->pa_listarprovinciam;
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
        $iddep = $request->editedItem["iddep"];
        $idprov = $request->editedItem["idprov"];
        $codigo = $request->editedItem["codigo"];
        $ubigeo = $request->editedItem["ubigeo"];
        $nombre = $request->editedItem["nombre"];

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_mantenimientoprovincia(:iddep,:idprov,:codigo,:ubigeo,:nombre)',
                ['iddep' => $iddep, 'idprov' => $idprov, 'codigo' => $codigo, 'ubigeo' => $ubigeo, 'nombre' => $nombre]
            );
            $cursor = $save[0]->pa_mantenimientoprovincia;
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
        $idprov = $request->id;

        DB::beginTransaction();

        try {
            $delete = DB::delete('DELETE FROM tbprovincia WHERE idprov=:idprov', ['idprov' => $idprov]);
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
