<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class SolicitudAdmisionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $_persona = $request->obj;
        $_direccion = $request->obj_direccion;
        $_conyuge = $request->obj_conyuge;
        $_familiar = $request->obj_familiar;
        $_datopersona = $request->obj_datopersona;
        $_solicitudadmision = $request->obj_solicitudadmision;
        $_foto = $request->obj[31];

        $personaConvert = json_encode($_persona);
        $personaConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $personaConvert) . "}";

        $direccionConvert = json_encode($_direccion);
        $direccionConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $direccionConvert) . "}";

        $conyugeConvert = json_encode($_conyuge);
        $conyugeConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $conyugeConvert) . "}";

        $familiarConvert = "";

        if(count($_familiar) > 0){
            $familiarConvert = json_encode($_familiar);
            $familiarConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $familiarConvert) . "}";
        }else{
            $familiarConvert = "{}";
        }

        $datoPersonaConvert = json_encode($_datopersona);
        $datoPersonaConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $datoPersonaConvert) . "}";

        $solicitudAdmisionConvert = json_encode($_solicitudadmision);
        $solicitudAdmisionConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $solicitudAdmisionConvert) . "}";

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_registrarsolicitudadmisionv2(:_persona,:_direccion,:_conyuge,:_familiar,:_datopersona,:_solicitudadmision,:_foto)',
                ['_persona' => $personaConvert, '_direccion' => $direccionConvert, '_conyuge' => $conyugeConvert,'_familiar' => $familiarConvert,'_datopersona' => $datoPersonaConvert,'_solicitudadmision' => $solicitudAdmisionConvert, '_foto' => $_foto]
            );

            $cursor = $save[0]->pa_registrarsolicitudadmisionv2;
            $cursor_data = DB::select('FETCH ALL IN "' . $cursor . '";');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        $idpersona_socio = $cursor_data[0]->idpersona_socio;
        $idpersona_conyuge = $cursor_data[0]->idpersona_conyuge;

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_rptsolicitudadmision(:_idpersona,:_idconyuge)',
                ['_idpersona' => $idpersona_socio, '_idconyuge' => $idpersona_conyuge]
            );
            $cursor = $save[0]->pa_rptsolicitudadmision;
            $dtsolicitud = DB::select('FETCH ALL IN "' . $cursor . '";');
            $cursor1 = $save[1]->pa_rptsolicitudadmision;
            $dtsocio = DB::select('FETCH ALL IN "' . $cursor1 . '";');
            $cursor2 = $save[2]->pa_rptsolicitudadmision;
            $dtconyuge = DB::select('FETCH ALL IN "' . $cursor2 . '";');
            $cursor3 = $save[3]->pa_rptsolicitudadmision;
            $dtempresa = DB::select('FETCH ALL IN "' . $cursor3 . '";');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        $fechaActual = date('d/m/Y');

        $data = [
            "solicitud" => $dtsolicitud[0],
            "socio" => $dtsocio[0],
            "conyuge" => $dtconyuge[0],
            "empresa" => $dtempresa[0],
            "fecha" => $fechaActual
        ];
        
        $fileName = $idpersona_socio.'_'.$idpersona_conyuge.'_report';
    
        $content = PDF::loadView('reportes.solicitudAdmision', $data)->output();
        Storage::disk('public')->put($fileName.'.pdf', $content);

        return response()->json($cursor_data);
    }

    public function print(Request $request)
    {
        $idpersona = $request->idpersona;
        $idconyuge = $request->idconyuge;

        $fileName = $idpersona.'_'.$idconyuge.'_report.pdf';
        $storage = public_path('storage').'/';
        $path = $storage.$fileName;

        if (file_exists($path)) {
            return response()->download($path);
        }
    }
}
