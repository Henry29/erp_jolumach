<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class SolicitudAdmisionController extends Controller
{
    public function find(Request $request)
    {
        $filtro = $request->filtro;

        $nrodocumento = $filtro["nrodocumento"];
        $estado_sad = $filtro["estado_sad"];
        $fecsol_inicio = $filtro["fecsol_inicio"];

        if($fecsol_inicio != null){
            $fecsol_inicio = date("Ymd", strtotime($fecsol_inicio));
        }

        $fecsol_fin = $filtro["fecsol_fin"];

        if($fecsol_fin != null){
            $fecsol_fin = date("Ymd", strtotime($fecsol_fin));
        }

        $tipolibro = $filtro["tipolibro"];
        $idugel = $filtro["idugel"];
        $insteduca = $filtro["insteduca"];
        $nrolibro = $filtro["nrolibro"];
        $tipoplanilla = $filtro["tipoplanilla"];
        $idcargo = $filtro["idcargo"];
        $tipocontrato = $filtro["tipocontrato"];
        $idregimenlab = $filtro["idregimenlab"];
        $idregimenpen = $filtro["idregimenpen"];
        $nroctasocio = $filtro["nroctasocio"];
        $nrodocsocio = $filtro["nrodocsocio"];
        $identificador_sad = $filtro["identificador_sad"];
        $nrodoc_beneficiario = $filtro["nrodoc_beneficiario"];
        $sexo_masculino = $filtro["sexo_masculino"];
        $sexo_femenino = $filtro["sexo_femenino"];
        
        DB::beginTransaction();

        try {
            $find = DB::select(
                'SELECT pa_listarsolicitudadmision2(:nrodocumento,:estado_sad,:fecsol_inicio,:fecsol_fin,:tipolibro,:idugel,:insteduca,
                :nrolibro,:tipoplanilla,:idcargo,:tipocontrato,:idregimenlab,:idregimenpen,:nroctasocio,:nrodocsocio,:identificador_sad,
                :nrodoc_beneficiario,:sexo_masculino,:sexo_femenino)',
                [
                'nrodocumento' => $nrodocumento, 
                'estado_sad' => $estado_sad, 
                'fecsol_inicio' => $fecsol_inicio,
                'fecsol_fin' => $fecsol_fin,
                'tipolibro' => $tipolibro,
                'idugel' => $idugel,
                'insteduca' => $insteduca, 
                'nrolibro' => $nrolibro,
                'tipoplanilla' => $tipoplanilla, 
                'idcargo' => $idcargo, 
                'tipocontrato' => $tipocontrato,
                'idregimenlab' => $idregimenlab,
                'idregimenpen' => $idregimenpen,
                'nroctasocio' => $nroctasocio,
                'nrodocsocio' => $nrodocsocio, 
                'identificador_sad' => $identificador_sad,
                'nrodoc_beneficiario' => $nrodoc_beneficiario,
                'sexo_masculino' => $sexo_masculino,
                'sexo_femenino' => $sexo_femenino, 
                ]
            );

            $cursor = $find[0]->pa_listarsolicitudadmision2;
            $curlistado = DB::select('FETCH ALL IN "' . $cursor . '";');

            if($identificador_sad > 0){
                $cursor1 = $find[1]->pa_listarsolicitudadmision2;
                $curentidad = DB::select('FETCH ALL IN "' . $cursor1 . '";');
    
                $cursor2 = $find[2]->pa_listarsolicitudadmision2;
                $curdireccion = DB::select('FETCH ALL IN "' . $cursor2 . '";');
    
                $cursor3 = $find[3]->pa_listarsolicitudadmision2;
                $curbeneficiario = DB::select('FETCH ALL IN "' . $cursor3 . '";');
            }
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        if($identificador_sad > 0){
            $data = [
                "curlistado" => $curlistado,
                "curentidad" => $curentidad,
                "curdireccion" => $curdireccion,
                "curbeneficiario" => $curbeneficiario
            ];
        }else{
            $data = $curlistado;
        }

        return response()->json($data);
    }

    public function state()
    {

        DB::beginTransaction();

        try {
            $state = DB::select('SELECT pa_listar_estado_solicitud()');
            $cursor = $state[0]->pa_listar_estado_solicitud;
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

    public function book()
    {

        DB::beginTransaction();

        try {
            $book = DB::select('SELECT pa_listar_libro()');
            $cursor = $book[0]->pa_listar_libro;
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

    public function update(Request $request)
    {
        $_identificador_sad = $request->obj_identificador_sad;
        $_persona = $request->obj;
        $_direccion = $request->obj_direccion;
        $_conyuge = $request->obj_conyuge;
        $_familiar = $request->obj_familiar;
        $_datopersona = $request->obj_datopersona;
        $_beneficiario = $request->obj_beneficiario;
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

        if(count($_beneficiario) > 0){
            $beneficiarioConvert = json_encode($_beneficiario);
            $pattern = ['~[{[<]~', '~[]}>]~'];
            $replacement = ['{', '}'];
            $beneficiarioConvert = preg_replace($pattern, $replacement, $beneficiarioConvert);    
        }else{
            $beneficiarioConvert = "{}";
        }

 
        $solicitudAdmisionConvert = json_encode($_solicitudadmision);
        $solicitudAdmisionConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $solicitudAdmisionConvert) . "}";

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_actualizarsolicitudadmisionv2(:_identificador_sad,:_persona,:_direccion,:_conyuge,:_familiar,:_datopersona,:_beneficiario,:_solicitudadmision,:_foto)',
                ['_identificador_sad' => $_identificador_sad,'_persona' => $personaConvert, '_direccion' => $direccionConvert, '_conyuge' => $conyugeConvert,'_familiar' => $familiarConvert,'_datopersona' => $datoPersonaConvert,'_beneficiario' => $beneficiarioConvert,'_solicitudadmision' => $solicitudAdmisionConvert, '_foto' => $_foto]
            );

            $cursor = $save[0]->pa_actualizarsolicitudadmisionv2;
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
        $_beneficiario = $request->obj_beneficiario;
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

        if(count($_beneficiario) > 0){
            $beneficiarioConvert = json_encode($_beneficiario);
            $pattern = ['~[{[<]~', '~[]}>]~'];
            $replacement = ['{', '}'];
            $beneficiarioConvert = preg_replace($pattern, $replacement, $beneficiarioConvert);    
        }else{
            $beneficiarioConvert = "{}";
        }

 
        $solicitudAdmisionConvert = json_encode($_solicitudadmision);
        $solicitudAdmisionConvert = "{" . preg_replace('#^\[(.*)\]$#', '{\1}', $solicitudAdmisionConvert) . "}";


        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_registrarsolicitudadmisionv2(:_persona,:_direccion,:_conyuge,:_familiar,:_datopersona,:_beneficiario,:_solicitudadmision,:_foto)',
                ['_persona' => $personaConvert, '_direccion' => $direccionConvert, '_conyuge' => $conyugeConvert,'_familiar' => $familiarConvert,'_datopersona' => $datoPersonaConvert,'_beneficiario' => $beneficiarioConvert,'_solicitudadmision' => $solicitudAdmisionConvert, '_foto' => $_foto]
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

        return response()->json($cursor_data);
    }

    public function print(Request $request)
    {
        $idpersona = $request->idpersona;
        $idconyuge = $request->idconyuge;

        $fileName = $idpersona.'_'.$idconyuge.'_report.pdf';
        $storage = public_path('storage').'/pdf'.'/';
        $path = $storage.$fileName;

        if (file_exists($path)) {
            return response()->download($path);
        }
    }

    public function upload(Request $request)
    {

        $idpersona = $request->idpersona;
        $idconyuge = $request->idconyuge;
        $updateFoto = 0;

        $idpersona_socio = $idpersona;
        $idpersona_conyuge = $idconyuge;

        $request->validate([
            'file' => 'mimes:png,jpeg,jpg|max:2024',
        ], 
        [
            'file.required' => 'El archivo es requerido!',
            'file.mimes' => 'El archivo debe tener la extensión jpeg,jpg,png!',
            'file.max' => 'El archivo no puede ser mayor a 1Mb!'
        ]);

        $fileName = $idpersona.'.'.$request->file->extension();  
        $storage = public_path('storage').'/avatar'.'/';
        $dir = 'avatar/'.$fileName;
        $request->file->move($storage, $fileName);
        $path = $storage.$fileName;

        if (file_exists($path)) {
            DB::beginTransaction();
            try {
                $updateFoto = DB::update(
                    'UPDATE tbpersona SET photo = ? WHERE idpersona = ?',
                    [$dir,$idpersona]
                );
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                die("error: " . $e->getMessage());
            } catch (Throwable $e) {
                DB::rollBack();
                die("error: " . $e->getMessage());
            }
        }

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
        Storage::disk('public')->put('pdf/'.$fileName.'.pdf', $content);

        return response()->json($updateFoto);

    }
}
