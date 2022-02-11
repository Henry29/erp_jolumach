<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11 text-center">
                <h5>COOPERATIVA DE SERVICIOS MÚLTIPLES DEL SECTOR EDUCACIÓN DEL DEPARTAMENTO
                    DE LAMBAYEQUE
                </h5>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-sm-1"></div>
            <div class="col-sm-11 text-center">
                <h4 style="text-decoration: underline">SOLICITUD DE INGRESO COMO SOCIO
                </h4>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-sm-12 text-left" style="font-size: 14px;">
                Señor: <br>
                <b>PRESIDENTE DEL CONSEJO DE ADMINISTRACIÓN</b>
                <p>S.P.</p>
                <p style="text-align: justify;text-indent: 40px;">Por intermedio de la presente, solicito se admita mi
                    INGRESO como Socio Activo de la Cooperativa; para lo cual, manifiesto conocer los objetivos y fines
                    de la COSEMSELAM y me comprometo a cumplir
                    con los Estatutos y Reglamentos vigentes:</p>
                <table style="width: 100%">
                    <tr style="width: 100%">
                        <td style="width: 50%;text-align: center;" colspan="2">DATOS PERSONALES</td>
                        <td style="width: 50%;text-align: center;" colspan="2">(A) DEL PROFESOR</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">APELLIDOS</td>
                        <td class="text-uppercase">{{ $socio->ape_pat }} {{ $socio->ape_mat }}</td>
                        <td style="font-weight: bold;">TIEMPO DE SERVICIO</td>
                        <td class="text-uppercase" style="text-align: center;">{{ $solicitud->tiemposervicio_dpe }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">NOMBRES</td>
                        <td class="text-uppercase">{{ $socio->nombres }}</td>
                        <td style="font-weight: bold;">CÓDIGO MODULAR</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">DIRECCION</td>
                        <td class="text-uppercase">{{ $socio->direccion }}</td>
                        <td style="font-weight: bold;">HABER MENSUAL</td>
                        <td style="text-align: center;" class="text-uppercase">{{ $solicitud->totalliquido_sad }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">UBICACIÓN</td>
                        <td class="text-uppercase">{{ $socio->departamento }}-{{ $socio->provincia }}-{{ $socio->distrito }}</td>
                        <td style="font-weight: bold;">GRADO DE ESTUDIOS</td>
                        <td style="text-align: left;" class="text-uppercase">{{ $socio->grado_estudio }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" class="text-uppercase">{{ $socio->idtipodocid }} N°</td>
                        <td class="text-uppercase">{{ $socio->nrodoc }}</td>
                        <td style="font-weight: bold;">NIVEL MAGISTERIAL</td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="text-align: center;" colspan="2">(B) DEL CENTRO EDUCATIVO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">TELÉFONO</td>
                        <td class="text-uppercase">{{ $socio->telefono }}</td>
                        <td style="font-weight: bold;" colspan="2"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">FECHA DE NACIMIENTO</td>
                        <td class="text-uppercase">{{ $socio->fecnac }}</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="2">LUGAR DE NACIMIENTO</td>
                        <td style="font-weight: bold;">LUGAR</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-uppercase">{{ $socio->lugar_nac }}</td>
                        <td style="font-weight: bold;">DISTRITO</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">ESTADO CIVIL</td>
                        <td class="text-uppercase">{{ $socio->estciv }}</td>
                        <td style="font-weight: bold;">PROVINCIA</td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="4">NOMBRES Y APELLIDOS DEL CÓNYUGE</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-uppercase">{{ $conyuge->nombres }} {{ $conyuge->ape_pat }} {{ $conyuge->ape_mat }}</td>
                    </tr>
                </table>
                <br>
                <p style="text-align: justify;text-indent: 40px;"> Adjunto a la presente, Carta Legalizada para que se
                    efectúe por planilla el descuento a favor de la COSEMSELAM por las aportaciones y servicios
                    recibidos, amparado en el T.U.O. de la Ley General de Cooperativas D.S. N°074-90-TR (Art. 79)</p>

                <p style="text-align: left;">Chiclayo, {{ $fecha }}</p>
            </div>
            <div class="row">
                <table style="width: 100%" class="pt-2">
                    <tr style="width: 100%">
                        <td style="width: 30%"></td>
                        <td style="width: 40%;text-align: center;" class="border-top border-dark">Firma del Solicitante
                        </td>
                        <td style="width: 30%"></td>
                    </tr>
                </table>
                <p style="text-align: center;font-size: 14px;" class="pt-2"><b>ACEPTADO</b>,el ingreso por el
                    Consejo de Administración en la Sesión de fecha: </p>
                <table style="width: 100%" class="pt-4">
                    <tr style="width: 100%">
                        <td style="width: 40%;text-align: center;font-size: 14px;" class="border-top border-dark">
                            SECRETARIO <br>
                            Consejo de Administración
                        </td>
                        <td style="width: 20%;text-align: center;">
                        </td>
                        <td style="width: 40%;text-align: center;font-size: 14px;" class="border-top border-dark">
                            PRESIDENTE <br>
                            Consejo de Administración</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
