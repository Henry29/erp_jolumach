<?php

namespace App\Http\Controllers\Caja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class ReporteCaja extends Controller
{
    public function ReporteBasico(){
        //return view('reportes/reporteCaja');
        $pdf = PDF::loadView('reportes/reporteCaja');
        return $pdf->download('Reporte.pdf');
    }
}
