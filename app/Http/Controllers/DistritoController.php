<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;
use Throwable;

class DistritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $idprov = $request->id;

        DB::beginTransaction();

        try {
            $distritos = DB::select(
                'SELECT pa_listarubigeodistrito(:idprov)',
                ['idprov' => $idprov]
            );
            $cursor = $distritos[0]->pa_listarubigeodistrito;
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

        $idprov = $request->editedItem["idprov"];
        $iddist = $request->editedItem["iddist"];
        $codigo = $request->editedItem["codigo"];
        $ubigeo = $request->editedItem["ubigeo"];
        $distrito = $request->editedItem["distrito"];

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_mantenimientodistrito(:idprov,:iddist,:codigo,:ubigeo,:distrito)',
                ['idprov' => $idprov, 'iddist' => $iddist, 'codigo' => $codigo, 'ubigeo' => $ubigeo, 'distrito' => $distrito]
            );
            $cursor = $save[0]->pa_mantenimientodistrito;
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
        $iddist = $request->id;

        DB::beginTransaction();

        try {
            $delete = DB::delete('DELETE FROM tbdistrito WHERE iddist=:iddist', ['iddist' => $iddist]);
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
