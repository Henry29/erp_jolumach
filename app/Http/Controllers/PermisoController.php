<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermisoController extends Controller
{
    public function ObtenerPermisos(Request $request){
        $idUsuario = $request->input('id');
        try{
            $select = DB::Select('SELECT descripcion, ruta
                FROM tbppermiso INNER JOIN tbcpermisouser ON tbppermiso.id = tbcpermisouser.idpermiso
                WHERE tbcpermisouser.idusers = '.$idUsuario);
        }catch(Exception $e){
            die("error: " . $e->getMessage());
        }
        return $select;
    }

    public function DarPermisoAuto(Request $request){
        $idUsuario = $request->input('id');
        try{
            DB::beginTransaction();
            DB::select('select PermisoAutomatico(?)', array($idUsuario));
        }catch(Exception $e){
            DB::rollBack();
            die("error: " . $e->getMessage());
        }
    }
    //requiere proteccion de back end
    public function DarPermiso(Request $request){
        $idUsuario = $request->input('id');
        $idPermisos = $request->input('permisos');
        DB::beginTransaction();
        $flag = true;
        try{
            $sql = 'INSERT INTO tbcpermisouser VALUES ';
            foreach ($idPermisos as $permit) {
                if ($flag) {
                    $sql .= '('.$permit.','.$idUsuario.')';
                    $flag = false;
                }else{
                    $sql .= ',('.$permit.','.$idUsuario.')';
                }
            }
            DB::insert($sql);
        }catch(Exception $e){
            DB::rollBack();
            die("error: " . $e->getMessage());
        }
    }
    //requiere proteccion de back end
    public function QuitarPermiso(Request $request){
        $idUsuario = $request->input('id');
        $idPermisos = $request->input('permisos');
        DB::beginTransaction();
        $flag = true;
        try{
            $sql = 'INSERT INTO tbcpermisouser VALUES ';
            foreach ($idPermisos as $permit) {
                if ($flag) {
                    $sql .= '('.$permit.','.$idUsuario.')';
                    $flag = false;
                }else{
                    $sql .= ',('.$permit.','.$idUsuario.')';
                }
            }
            DB::insert($sql);
        }catch(Exception $e){
            DB::rollBack();
            die("error: " . $e->getMessage());
        }
    }
}
