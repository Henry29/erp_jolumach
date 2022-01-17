<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;
use Throwable;

class InstitucionEducativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $idugel = $request->id;

        DB::beginTransaction();

        try {
            $institucionEducativa = DB::select(
                'SELECT pa_listarinstitucionedu(:idugel)',
                ['idugel' => $idugel]
            );
            $cursor = $institucionEducativa[0]->pa_listarinstitucionedu;
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
        $idinstedu = $request->editedItem["idinstedu"];
        $idugel = $request->editedItem["idugel"];
        $idtipinstedu = $request->editedItem["idtipinstedu"];
        $descripcion = $request->editedItem["descripcion"];
        $codigo = $request->editedItem["codigo"];
        $idzona = $request->editedItem["idzona"];
        $nomzona = $request->editedItem["nomzona"];
        $iddeno = $request->editedItem["iddeno"];
        $direccion = $request->editedItem["direccion"];
        $refdir = $request->editedItem["refdir"];
        $telefono = $request->editedItem["telefono"];
        $estado = $request->editedItem["estado"];
        $codubi = $request->editedItem["codubi"];

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_mantenimientoinstitucionedu(:idinstedu,:idugel,:idtipinstedu,:descripcion,:codigo,:idzona,:nomzona,:iddeno,:direccion,:refdir,:telefono,:estado,:codubi)',
                ['idinstedu' => $idinstedu, 'idugel' => $idugel, 'idtipinstedu' => $idtipinstedu, 'descripcion' => $descripcion, 'codigo' => $codigo, 'idzona' => $idzona, 'nomzona' => $nomzona, 'iddeno' => $iddeno, 'direccion' => $direccion, 'refdir' => $refdir, 'telefono' => $telefono, 'estado' => $estado, 'codubi' => $codubi]
            );
            $cursor = $save[0]->pa_mantenimientoinstitucionedu;
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
        $idinstedu = $request->id;

        DB::beginTransaction();

        try {
            $delete = DB::delete('DELETE FROM tbinstitucionedu WHERE idinstedu=:idinstedu', ['idinstedu' => $idinstedu]);
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
