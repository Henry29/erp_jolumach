<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>

    {{-- <link rel="stylesheet" href="css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <style>
        .table-custom {
            /* border: 1px solid; */
            font-size: 10px !important;
        }

    </style>

    <!-- Solicitud de ingreso como Socio -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <table style="width: 100%;">
                    <tr style="width: 100%;">
                        <td style="width: 20%;">
                            <img src="{{ public_path('images/logo_cosemselam.png') }}"
                                style="width: 100%;height: 100px;">
                        </td>
                        <td style="width: 60%;text-align:center;">
                            <h5>COOPERATIVA DE SERVICIOS MÚLTIPLES DEL SECTOR EDUCACIÓN DEL DEPARTAMENTO
                                DE LAMBAYEQUE
                            </h5>
                        </td>
                        <td style="width: 20%;">
                            <img src="{{ public_path('storage/'.$socio->foto)}}" style="width: 100%;height: 100px;">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container">
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
                    <p style="text-align: justify;text-indent: 40px;">Por intermedio de la presente, solicito se admita
                        mi
                        INGRESO como Socio Activo de la Cooperativa; para lo cual, manifiesto conocer los objetivos y
                        fines
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
                            <td class="text-uppercase" style="text-align: center;">{{ $solicitud->tiemposervicio_dpe }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">NOMBRES</td>
                            <td class="text-uppercase">{{ $socio->nombres }}</td>
                            <td style="font-weight: bold;">CÓDIGO MODULAR</td>
                            <td>codiiii</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">DIRECCION</td>
                            <td class="text-uppercase">{{ $socio->direccion }}</td>
                            <td style="font-weight: bold;">HABER MENSUAL</td>
                            <td style="text-align: center;" class="text-uppercase">{{ $solicitud->totalliquido_sad }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">UBICACIÓN</td>
                            <td class="text-uppercase">
                                {{ $socio->departamento }}-{{ $socio->provincia }}-{{ $socio->distrito }}</td>
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
                            <td colspan="4" class="text-uppercase">{{ $conyuge->nombres }} {{ $conyuge->ape_pat }}
                                {{ $conyuge->ape_mat }}</td>
                        </tr>
                    </table>
                    <br>
                    <p style="text-align: justify;text-indent: 40px;"> Adjunto a la presente, Carta Legalizada para que
                        se
                        efectúe por planilla el descuento a favor de la COSEMSELAM por las aportaciones y servicios
                        recibidos, amparado en el T.U.O. de la Ley General de Cooperativas D.S. N°074-90-TR (Art. 79)
                    </p>

                    <p style="text-align: left;">Chiclayo, {{ $fecha }}</p>
                </div>
                <div class="row">
                    <table style="width: 100%" class="pt-2">
                        <tr style="width: 100%">
                            <td style="width: 30%"></td>
                            <td style="width: 40%;text-align: center;" class="border-top border-dark">Firma del
                                Solicitante
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
    </div>
    <!-- Solicitud descuento por planilla PDF -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <table style="width: 100%;">
                    <tr style="width: 100%;">
                        <td style="width: 20%;">
                            <img src="{{ public_path('images/logo_cosemselam.png') }}"
                                style="width: 100%;height: 100px;">
                        </td>
                        <td style="width: 60%;text-align:center;">
                            <h5>COOPERATIVA DE SERVICIOS MÚLTIPLES DEL SECTOR EDUCACIÓN DEL DEPARTAMENTO
                                DE LAMBAYEQUE
                            </h5>
                        </td>
                        <td style="width: 20%;">
                            <!-- <img src="{{ public_path('storage/'.$socio->foto)}}" style="width: 100%;height: 100px;"> -->
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row pt-2">
                <div class="col-sm-11 text-center">
                    <h4 style="text-decoration: underline">SOLICITUD DE DESCUENTO POR PLANILLA
                    </h4>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-sm-12 text-left" style="font-size: 14px;">
                    Señor: <br>
                    <b>PRESIDENTE DEL CONSEJO DE ADMINISTRACIÓN</b>
                    <p>S.D.</p>
                    <p>Con domicilio en: <br> calle francisco cabrera 274 - chiclayo - chiclayo</p>
                    <p style="text-align: justify;text-indent: 40px;">
                        Socio Nº <strong>15161</strong> de la Cooperativa de Servicios Múltiples del Sector Educación
                        del Departamento de
                        Lambayeque COSEMSELAM, AUTORIZO a la Dirección a su cargo para que descuente por planilla las
                        sumas que señale mi Cooperativa con cargo a mi haber mensual o pensión, por los servicios
                        recibidos; amparados en el Art. 79 del T.U.O.; de la Ley General de Cooperativas D.S. Nº
                        074-90-TR., acompaño los siguientes datos: </p>

                    <table>
                        <thead>
                            <!-- <th>a</th> -->
                            <!-- <th>a</th> -->
                        </thead>
                        <tr>
                            <td style="font-weight: bold;">Apellidos y Nombres del Socio(a):</td>
                            <td class="text-uppercase">{{ $socio->ape_pat }} {{ $socio->ape_mat }} {{ $socio->nombres }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Carben: </td>
                            <td class="text-uppercase">{{ $socio->carben }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Distrito: </td>
                            <td class="text-uppercase">{{ $socio->distrito }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Provincia: </td>
                            <td class="text-uppercase">{{ $socio->provincia }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Departamento: </td>
                            <td class="text-uppercase">{{ $socio->departamento }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Tipo de Planilla: </td>
                            <td class="text-uppercase">{{ $socio->tipo_planilla }}</td>
                        </tr>
                    </table>
                    <br>
                    <p style="text-align: right;"><strong>POR LO EXPUESTO:</strong> </p>
                    <p style="text-align: right;text-indent: 200px;">
                        Adjunto a la presente, Carta Legalizada para que se efectúe por planilla el descuento a favor de
                        la COSEMSELAM por las aportaciones y servicios
                        recibidos, amparado en el T.U.O. de la Ley General de Cooperativas D.S. N°074-90-TR (Art. 79)
                    </p>
                    <br>
                    <p style="text-align: center;">Es justicia que espero alcanzar</p>

                    <p style="text-align: right">Chiclayo, {{ $fecha }}</p>
                </div>
                <br>
                <div class="col-lg-12 text-center" style="align-items: center; text-align: center;">
                    <hr color="black" size=1 width="200px">
                    <p>Firma del Solicitante</p>
                </div>
            </div>
        </div>
        <br>
    </div>
    <hr>
    <!-- carta de autorizacion de descuento -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <table style="width: 100%;">
                    <tr style="width: 100%;">
                        <td style="width: 20%;">
                            <img src="{{ public_path('images/logo_cosemselam.png') }}"
                                style="width: 100%;height: 100px;">
                        </td>
                        <td style="width: 60%;text-align:center;">
                            <!-- <h5>COOPERATIVA DE SERVICIOS MÚLTIPLES DEL SECTOR EDUCACIÓN DEL DEPARTAMENTO
                                DE LAMBAYEQUE
                            </h5> -->
                        </td>
                        <td style="width: 20%;">
                            <!-- <img src="{{ public_path('storage/'.$socio->foto)}}" style="width: 100%;height: 100px;"> -->
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row pt-2">
                <div class="col-sm-11 text-center">
                    <h4 style="text-decoration: underline">CARTA DE AUTORIZACIÓN DE DESCUENTO
                    </h4>
                    <p style="text-align: right">Chiclayo, {{ $fecha }}</p>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-sm-12 text-left" style="font-size: 14px;">
                    Señor: <br>
                    <b class="text-uppercase">director regional de Educación</b>
                    <p>Presente.</p>
                    <p>De mi mayor consideracion</p>
                    <p style="text-align: justify;text-indent: 40px;">
                        Por la presente hago de su conocimiento que soy socio(a) de la Cooperativa de Servicios
                        Múltiples del Sector de Educación del Departamento de Lambayeque - COSEMSELAM, quien me concede,
                        préstamos y servicios los mismos que serán descontados en cuotas mensuales.
                    </p>

                    <p style="text-align: justify;text-indent: 40px;">
                        Por tal motivo SOLICITO A UD. Señor Director se sirva disponer se descuente las cuotas mensuales
                        indicadas por la Cooperativa, de mis remuneraciones que me corresponden como trabajador
                        activo(a) o cesante de la I.E. C.E.: 10924 UPBARTESANOS, perteneciente a la UGEL CHICLAYO,
                        dinero que autorizo se le entregue a la Cooperativa COSEMSELAM y que corresponde a la
                        amortización, préstamos, servicios y aportes. Mi petición la hago al amparo del Art. 79 del
                        T.U.O. de la ley de Cooperativa D.S 074-90-TR, Sin excluir los meses julio y diciembre.
                    </p>
                    <p style="text-align: right;">Agradezco anticipadamente por la atención que le brinde a la presente.
                    </p>
                    <h6 class="col-lg-12 text-center" style="align-items: center; text-align: center;">Atentamente</h6>
                    <br>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="border-right: 1px solid;" colspan="2"><strong>Apellidos y Nombres:</strong>
                                    {{ $socio->ape_pat }} {{ $socio->ape_mat }}
                                    {{ $socio->nombres }} <br>
                                    <strong>Dirección:
                                    </strong>{{ $socio->direccion }} <br>
                                    <strong>DNI N°:
                                    </strong>numerososcio<br>
                                    <strong>Cuenta N°:
                                    </strong>nuemerocuentaa
                                </td>
                                <td style="border-top: 1px solid; border-right: 1px solid; width: 150px;"></td>
                            </tr>
                            <!-- <tr>
                                <td style="border-right: 1px solid;" colspan="2"></td>
                                <td style="border-right: 1px solid; width: 200px;"></td>
                            </tr>
                            <tr>
                                <td style="border-right: 1px solid;" colspan="2"></td>
                                <td style="border-right: 1px solid; width: 200px;"></td>
                            </tr> -->
                            <tr>
                                <td style="border-right: 1px solid;" colspan="2"></td>
                                <td class="text-center border-top-0"
                                    style="border-right: 1px solid; border: 1px solid; width: 150px;"><small
                                        class="">HUELLA DIGITAL I.D</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
    <hr>
    <!-- INFORME DE INGRESO DE SOCIO -->
    <div class="container">
        <!-- Informe de ingresos -->
        <table class="table table-borderless ">
            <thead>
                <tr class="table-active">
                    <th colspan="3" scope="col" class="text-center">INFORME DE INGRESO DE SOCIO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">SOCIO:</th>
                    <td>{{ $socio->ape_pat }} {{ $socio->ape_mat }} {{ $socio->nombres }}</td>
                </tr>
                <tr>
                    <th scope="col">DNI:</th>
                    <td>docsoscio</td>
                </tr>
                <tr>
                    <th scope="col">EDAD:</th>
                    <td>variables de edad</td>
                </tr>
                <tr>
                    <th scope="col">C.E.:</th>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="col">TELÉFONO:</th>
                    <td>{{ $socio->telefono }} </td>
                </tr>
                <tr>
                    <th scope="col">CORREO:</th>
                    <td>Variable correo</td>
                </tr>

            </tbody>
        </table>
        <!-- Datos laborales -->
        <table class="table table-borderless ">
            <thead>
                <tr class="table-active">
                    <th colspan="3" scope="col" class="text-center">REFERENCIA DE DATOS LABORALES</th>
                </tr>
                <tr>
                    <th style="text-decoration: underline">DOCENTE NOMBRADO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" style="width: 200px;">INGRESO A LABORAR:</th>
                    <td>fechaLaboral</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">RÉGIMEN LABORAL:</th>
                    <td>regimenLaboral</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">RÉGIMEN PENSIONARIO:</th>
                    <td>regimenPensionario</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">REMUNERACIÓN :</th>
                    <td>renum</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">TOTAL LÍQUIDO:</th>
                    <td>totalLiq</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">MONTO IMPONIBLE:</th>
                    <td>montoImpo</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">TERMINO:</th>
                    <td>term</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 200px;">BOLETA DE:</th>
                    <td>Bole</td>
                </tr>

            </tbody>
        </table>
        <!-- Referencia de riesgos crediticios -->
        <table class="table table-borderless ">
            <thead>
                <tr class="table-active">
                    <th colspan="3" scope="col" class="text-center">REFERENCIA DE RIESGOS CREDITICIOS</th>
                </tr>
                <tr>
                    <th>REFERENCIAS NEGATIVAS: </th>
                </tr>
            </thead>
        </table>

        <!-- Registro Crediticio consolidado -->
        <table class="table table-borderless ">
            <thead>
                <tr class="table-active">
                    <th colspan="3" scope="col" class="text-center">REGISTRO CREDITICIO CONSOLIDADO</th>
                </tr>
                <tr>
                    <th>SITUACIÓN EN ENTIDADES FINANCIERAS</th>
                </tr>
            </thead>
        </table>
        <br>
        <p style="text-align: center">Chiclayo, {{ $fecha }}</p>
        <br>
        <table class="table table-borderless ">
            <thead>
                <tr>
                    <th style="color: #072066;" colspan="3" scope="col">Calle: Tarata # 169 - Chiclayo - Telf: Nº (074)
                        223282 - 221121 - CEL: 956571112 <br>
                        Fundada: 05/01/1976 - Inscripción SUNARP: Asiento 4, Folio 192, Libro 1; Partida Electrónica Nº
                        11001723
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr class="text-center">
                    <td scope="col"><img src="" alt="logo-minisperu"></td>
                    <th>FORMATO N° 01: <br>AUTORIZACIÓN DE DESCUENTO MEDIANTE LA PLANILLA UNICA DE PAGO</th>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <hr>
    <!-- AUTORIZACION PLANILLA FORMULARIO -->
    <div class="container">
        <p>Yo {{ $socio->ape_pat }} {{ $socio->ape_mat }} {{ $socio->nombres }} identificado con DNI N°:
            1233666</p>
    
        <p>Autorizo de manera expresa para que a través de la planilla única de pago (Sistema Único de Planillas - SUP)
            se descuente de mis remuneraciones y/o pensiones mensuales, el compromiso adquirido con la entidad regulada
            por el DS. N° 010-2014- EF Y Oficio Múltiple N° 061-2016-MINEDUNMGP-DIGEDD-DITEN según el siguiente detalle:
        </p>
    </div>
    <div class="table-custom">
        <!-- item1 -->
        <br>
        <p><strong>1. DATOS LABORALES DEL QUE AUTORIZA:</strong></p>

        <table class="table   border-bottom-0" style="border-top: hidden;">
            <tr>
                <th style="width: 25%;">Condición Laboral marcar ( )</th>
                <td>(&nbsp; &nbsp; ) Nombrado <br>(&nbsp; &nbsp; ) Contratado <br>(&nbsp; &nbsp; ) Pensionista </td>
            </tr>
        </table>

        <table class="table ">
            <tbody>
                <tr>
                    <th style="border-top: hidden; width: 25%;">IGED (DRE/UGEL):</th>
                    <td style="border: 0.2px solid;">CHICLAYO</td>
                </tr>
            </tbody>
        </table>

        <!-- item2 -->
        <p><strong>2. DATOS DE LA ENTIDAD CON QUIEN ASUME EL COMPROMISO</strong></p>

        <table class="table  table-bordered" style="border: 1px solid;">
            <thead>
                <tr class="text-justify ">
                    <th colspan="8">COOPERATIVA DE SERVICIOS MULTIPLES DEL SECTOR EDUCACION DEL DEPARTAMENTO DE
                        LAMBAYEQUE- COSEMSELAM </th>
                </tr>
                <tr>
                    <th colspan="8">20103430381</th>
                </tr>
            </thead>
            <tbody>
                <tr style="width: 10%;" class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td>Sindicales</td>
                    <td> (&nbsp; &nbsp; )</td>
                    <td>Fondo de Bienestar</td>
                    <td> (&nbsp; &nbsp; )</td>
                    <td>Cooperativa</td>
                    <td> (&nbsp; &nbsp; )</td>
                    <td>Superv. SBS</td>
                    <td> (&nbsp; &nbsp; )</td>
                </tr>
            </tbody>
        </table>

        <p>En caso de ser Fondo de Bienestar, marcar el concepto de atención</p>
        <table class="table  table-bordered">
            <tbody>
                <tr style="width: 10%;" class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td>Alimentacion</td>
                    <td> (&nbsp; &nbsp;)</td>
                    <td>Salud</td>
                    <td> (&nbsp; &nbsp;)</td>
                    <td>Educacion</td>
                    <td> (&nbsp; &nbsp;)</td>
                    <td>Vivienda</td>
                    <td> (&nbsp; &nbsp;)</td>
                </tr>
                <tr style="width: 10%;" class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td>Exparcimiento</td>
                    <td> (&nbsp; &nbsp;)</td>
                    <td>Sepelio</td>
                    <td> (&nbsp; &nbsp;)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <!-- item3 -->
        <p><strong>3. DETALLE DEL COMPROMISO Y DESCUENTO</strong></p>
        <p>(&nbsp; &nbsp;) Aportes obligatorios mensuales (sindicales, socios cooperativos, asociaciones,
            etc)</p>

        <table class="table" style="border-top: hidden;">
            <tbody>
                <tr class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <th style="width: 10px;">Inicio:</th>
                    <td> Mes:__________</td>
                    <td> Año:__________</td>
                    <th style="width: 10px;">Término:</th>
                    <td> Mes:__________</td>
                    <td> Año:__________</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td style="width: 20%;">Descto. Mensual S/.</td>
                    <td></td>
                    <td style="width: 14%;">Nro. Cuotas:</td>
                    <td></td>
                    <td style="width: 20%;">Total A Descontar S/.</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td style="width: 8%;">(&nbsp; &nbsp; &nbsp;)</td>
                    <td>Se ha verificado del promedio de las 3 últimas remuneraciones mensuales y el presente compromiso está dentro de los alcances deI 50% del monto neto</td>
                    
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr class="text-justify">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td style="width: 10%; "></td>
                    <td style="border-top: hidden; border-bottom: hidden;"></td>
                    <td style="width: 55%;  border: hidden;"><br><br>_________________________________<br>Lugar y fecha: </td>
                    <!-- <td style="width: 20%;"><br><br>______________________________ <br>Firma Autorizada</td> -->
                    
                </tr>
                <tr class="text-center" style="width: 10%; border-bottom: hidden;">
                    <td style=" border-left: hidden; border-right: hidden;">Huella</td>
                </tr>
            </tbody>
        </table>

        <table class="table" style="border: hidden;">
            <tbody>
                <tr class="text-center">
                    <td>_______________________________________________<br>Firma del que autoriza </td>
                    
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr class="text-center">
                    <!-- <td   style="border: 0px;"></td> -->
                    <td style="border: hidden;">_____________________________<br>V°B° del  Rep. De la Entidad</td>
                    <td style="border: hidden;">_____________________________<br>V°B° del Administrador de la IGED</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <hr>
</body>

</html>
