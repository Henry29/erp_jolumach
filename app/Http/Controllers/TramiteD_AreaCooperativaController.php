<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;
class TramiteD_AreaCooperativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    

  //-----------------------------------------------------------
    // estos datos se encontraron en .NET  

$id_ane =0;
$descrip_ane = "";
$tipo_ane = "";
$idadmin_tane = 0;
$id_tane =43;
$orden_tane=0;
//-----------------------------------------------------------------

DB::beginTransaction();

try {
    $save = DB::select(
        'SELECT pa_listarmtd(:identificador_ane,:descripcion_ane,:tipo_ane,:identificadoradmin_tane,:identificador_tane,:orden_ane)',
        ['identificador_ane' => $id_ane,
         'descripcion_ane' => $descrip_ane,
         'tipo_ane' => $tipo_ane,
         'identificadoradmin_tane' => $idadmin_tane ,
         'identificador_tane' => $id_tane ,
         'orden_ane' => $orden_tane]
    );
    $cursor = $save[0]->pa_listarmtd;
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
        //es datos son tomados de la tabla tbanexo
    $id_ane =$request->editedItem["identificador_ane"];  
    $descrip_ane = $request->editedItem["descripcion_ane"];
    $estado_ane="true";
    $tipo_ane = "";
    $idadmin_tane = 0;
    $id_tane =43;
    $orden_tane=0;
    $obligatorio_ane="true";


    DB::beginTransaction();

    try {
        $save = DB::select(
            'SELECT pa_mantenimientomtd(:identificador_ane,:descripcion_ane,:estado_ane,:tipo_ane,:identificadoradmin_tane,:identificador_tane,:orden_ane,:obligatorio_ane)',
            ['identificador_ane' => $id_ane,
             'descripcion_ane' => $descrip_ane,
             'estado_ane' => $estado_ane,
             'tipo_ane' => $tipo_ane,
             'identificadoradmin_tane' => $idadmin_tane ,
             'identificador_tane' => $id_tane ,
             'orden_ane' => $orden_tane,
             'obligatorio_ane' => $obligatorio_ane]
        );
        $cursor = $save[0]->pa_mantenimientomtd;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
