<?php

namespace App\Http\Controllers\TramiteDocumentario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;

class SolicitudTramiteDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $filtro = $request->filtro;
        // if($fectramite_inicio != null){
            // $fectramite_inicio = date("Ymd", strtotime($fectramite_inicio));
        // }
        // try{
        //     $find = DB::select(
        //         // 'SELECT pa_listartramitedocumentario(:nroexpediente_tdo)',
        //     );
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     die("error: " . $e->getMessage());
        // } catch (Throwable $e) {
        //     DB::rollBack();
        //     die("error: " . $e->getMessage());
        // }
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
        //
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
    public function destroy($id)
    {
        //
    }
}
