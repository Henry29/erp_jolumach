@extends('../masterPlantilla')
@section('content')
<div style="margin-bottom: 15px;">
    <div style="display: inline-block; width: 50%;">
        <img src="{{ public_path('images/logo_Full.jpg') }}" style="width: 80%;">
    </div>
    <div style="display: inline-block; width: 49%; text-align: center;">
        <span><b>VOUCHER N° XXX</b></span>
    </div>
</div>
<div class="capsula">
    <div style="margin-bottom: 10px;">
        <div style="width: 40%;"
            class="bloque subray">RECIBO DE EGRESOS XXX-RXXXXXXXX</div>
        <div style="width: 9%;"
            class="bloque">Chiclayo</div>
        <div style="width: 32%;"
            class="bloque subray">miércoles, 12 de septiembre de 2019</div>
        <div style="width: 7%;"
            class="bloque">Total</div>
        <div style="width: 9%;"
            class="bloque subray">9999.99</div>
    </div>
    <div style="margin-bottom: 10px;">
        <div style="width: 16%; text-align: left;"
            class="bloque">Páguese a la: </div>
        <div style="width: 81%;"
            class="bloque subray">REPOSICION DE CAJA DIARIO</div>
    </div>
    <div style="margin-bottom: 0px;">
        <div style="width: 16%; text-align: left;"
            class="bloque">orden de: </div>
        <div style="width: 81%;"
            class="bloque subray">TREINTA Y DOS Y 24/100 SOLES</div>
    </div>
</div>
<div class="capsula">
    <div style="margin-bottom: 10px;">
        <div style="width: 16%; text-align: left;"
            class="bloque">NOMBRE: </div>
        <div style="width: 81%;"
            class="bloque subray">CABREJOS NUÑEZ MERY YOLANDA</div>
    </div>
    <div style="margin-bottom: 10px;">
        <div style="width: 16%; text-align: left;"
            class="bloque">DETALLE: </div>
        <div style="width: 81%;"
            class="bloque subray">REPOSICION DE CAJA DIARIO</div>
    </div>
    <div style="margin-bottom: 0px;">
        <div style="width: 16%; text-align: left;"
            class="bloque">TOTAL: </div>
        <div style="width: 81%; text-align: left;"
            class="bloque">32.24</div>
    </div>
</div>
<div style="margin-top: 40px;">
    <div style="width: 60%" class="bloque"></div>
    <div style="width: 38%" class="bloque">
        <div style= "width: 97%;"class="bloque">RECIBI CONFORME</div>
        <div style= "width: 60%; height: 70px; margin: auto;" class="bloque subray"></div>
    </div>
</div>
<div style="margin-top: 10px;">
    <div style="display: inline-block; width: 54%;">
        <table>
            <tr>
                <td>PREP</td>
                <td>V°B°<br>CONTADOR</td>
                <td>REGISTRO<br>CTAS.CTES</td>
                <td>REGISTRO<br>CONTABILIDAD</td>
                <td>REVISADO</td>
                <td>REVISADO</td>
            </tr>
            <tr>
                <td><br><br></td>
                <td><br><br></td>
                <td><br><br></td>
                <td><br><br></td>
                <td><br><br></td>
                <td><br><br></td>
            </tr>
        </table>
    </div>
    <div style="display: inline-block; width: 35%;">
        <table style="border: none;">
            <tr>
                <td style="border: none; height: 25px;">NOMBRE</td>
                <td style="border: none; height: 25px;">&nbsp;</td>
                <td style="border: none; height: 25px; width: 150px; border-bottom: 1px solid;"></td>
            </tr>
            <tr>
                <td style="border: none; height: 25px;">DNI</td>
                <td style="border: none; height: 25px;">&nbsp;</td>
                <td style="border: none; height: 25px; width: 150px; border-bottom: 1px solid;"></td>
            </tr>
        </table>
    </div>
    <div style="display: inline-block;">
        <div style="width: 60px; height: 60px; border: 1px solid;"></div>
    </div>
</div>
<div style="margin-top: 40px;text-align: center;">
    <span><b>COSEMSELAM</b></span>
</div>
<div style="margin-top: 60px; text-align: center;">
    <div style="display: inline-block; width: 30%;">
        <div class="subray" style="height: 50px;"></div>
        <div>PRESIDENTE</div>
    </div>
    <div style="display: inline-block; width: 30%;">
        <div class="subray" style="height: 50px;"></div>
        <div>GERENTE</div>
    </div>
</div>
@endsection