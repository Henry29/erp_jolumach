<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonedaController extends Controller
{
    public function Getter(){
        $data = DB::select("SELECT * FROM tbmoneda");
        return $data;
    }
}
