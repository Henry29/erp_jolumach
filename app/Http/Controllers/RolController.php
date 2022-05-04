<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;

class RolController extends Controller
{
    public function index()
    {

        DB::beginTransaction();

        try {
            $rol = DB::select('SELECT pa_listarestadoxsolicitud()');
            $cursor = $rol[0]->pa_listarestadoxsolicitud;
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
}
