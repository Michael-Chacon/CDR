<?php

include 'MPDF56/mpdf.php';

$mpdf = new mPDF('', // mode - default ''
    'letter', // format - A4, for example, default ''
    9, // font size - default 0
    'sans', // default font family
    20, // margin_left
    20, // margin right
    20, // margin top
    40, // margin bottom
    9, // margin header
    9, // margin footer
    'P'); // L - landscape, P - portrait

$mpdf->AddPage('P');
$html = '
    <div id="details" class="clearfix">
        <div id="client">
            <h2 class="name">' . name_col . '</h2>
            <div class="address">Valle de San José</div>
            <div class="email"><strong>Sede:</strong> PRINCIPAL</div>
            <div class="vereda"><strong>Dane:</strong> 168855000154</div>
            <div class="vereda"><strong>NIT:</strong> 890.204.616-2</div>
        </div>
        <div id="invoice">
            <div class="date">.</div>
            <div class="date"></div>
            <div class="date">.</div>
            <img class="logo" src="helpers/img/escudo_base.jpg">
        </div>
    </div>
     <hr>
     <br>
     <br>
    <div class="asunto">
        <td class="asunto"><span class="subtitulo-head">Información del docente</span></td>
    </div>
    <br>
    <div class="datos">
        <table class="tabla-personal">
            <tbody>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Nombre:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->nombre_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Apellidos:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->apellidos_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Fecha de nacimiento:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->fecha_nacimiento_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Edad:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.Utils::hallarEdad($docente->fecha_nacimiento_d).'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Genero:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->sexo_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Número de identificación:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->numero_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Lugar de expedición:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->lugar_expedicion_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Fecha de expedición:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->fecha_expedicion_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Dirección:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->direccion_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Telefono:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->telefono_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Correo:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->correo_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Incapacidad medica:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->incapacidad_medica_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Grupo sanguineo:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->grupo_sanguineo_d. $docente->rh_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Fecha  de posesion:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->fecha_posesion_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Número acta de posesión:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->numero_acta_posesion_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Número resolución de posesión:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->numero_resolucion_posesion_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Pregrado:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->pregrado_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Nombre del pregrado:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->nombre_pregrado_d.'</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Posgrado:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->posgrado_d.'</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Nombre del posgrado:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">'.$docente->nombre_posgrado_d.'</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    ';
$css = file_get_contents(base_url . 'helpers/css/pdf.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$ruta = 'file/' . date('Ymdhis') . '.pdf';
$mpdf->Output($ruta);
?>
<script language="JavaScript">
    window.open('<?php echo base_url . $ruta; ?>','_top','toolbar=yes,location=yes,status=yes,menubar=yes,personalbar=yes,scrollbars=yes,resizable=yes');
</script>
