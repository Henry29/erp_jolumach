<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;
use Throwable;

class TipoDiscapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        DB::beginTransaction();
        $identificador_ane = 0;
        $descripcion_ane = NULL;

        try {
            $tipo_discapacidad = DB::select('SELECT pa_listartipodiscapacidad(:identificador_ane,:descripcion_ane)', ["identificador_ane" => $identificador_ane, "descripcion_ane" => $descripcion_ane]);
            $cursor = $tipo_discapacidad[0]->pa_listartipodiscapacidad;
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
        $identificador_ane = $request->editedItem["identificador_ane"];
        $identificador_tane = $request->editedItem["identificador_tane"];
        $descripcion_ane = $request->editedItem["descripcion_ane"];
        $estado_ane = $request->editedItem["estado_ane"];

        DB::beginTransaction();

        $obligatorio = true;

        try {
            $save = DB::select(
                'SELECT pa_mantenimientotipodiscapacidad(:identificador_ane,:descripcion_ane,:estado_ane,:identificador_tane,:obligatorio)',
                ['identificador_ane' => $identificador_ane, 'descripcion_ane' => $descripcion_ane, 'estado_ane' => $estado_ane, 'identificador_tane' => $identificador_tane,'obligatorio' => $obligatorio]
            );
            $cursor = $save[0]->pa_mantenimientotipodiscapacidad;
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
        $identificador_ane = $request->id;

        DB::beginTransaction();

        try {
            $delete = DB::delete('DELETE FROM tbanexo WHERE identificador_ane=:identificador_ane', ['identificador_ane' => $identificador_ane]);
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
