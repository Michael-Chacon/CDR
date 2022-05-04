<?php

include 'MPDF56/mpdf.php';

$mpdf = new mPDF('', // mode - default ''
    'letter', // format - A4, for example, default ''
    9, // font size - default 0
    'sans', // default font family
    10, // margin_left
    10, // margin right
    10, // margin top
    10, // margin bottom
    9, // margin header
    9, // margin footer
    'P'); // L - landscape, P - portrait

$mpdf->AddPage('P');
if($listado_personal->rowCount()  != 0):
    $html = '
        <div id="details" class="clearfix">
            <div id="client">
                <h2 class="name">'.name_col.'</h2>
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
        <div class="asunto">
            <td class="asunto"><span class="subtitulo-head">Listado de funcionarios auxiliares</span></td>
        </div>
        <table class="tabla-listado-personal">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Cargo</th>
                </tr>
            </thead>
            <tbody>';
                $contador = 1;
                while($empleado = $listado_personal->fetchObject()):
                    $html .='<tr>
                        <td class="linea numero">'.$contador++.'</td>
                        <td class="linea"><span class="nombre-numero">'.$empleado->apellidos_per .'  '. $empleado->nombre_per.'</td>
                        <td class="linea"><span class="nombre-numero">'.$empleado->numero_per.'</td>
                        <td class="linea"><span class="nombre-numero">'.ucfirst($empleado->cargo_per).'</td>
                    </tr>';
                endwhile;
            $html .= '</tbody>
        </table>';
else:
    $html = '<div class="alerta">
         Aún no hay  funcionarios auxiliares registrados en la plataforma.
    </div>';
endif;

$css = file_get_contents(base_url . 'helpers/css/pdf.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$ruta = 'file/' . date('Ymdhis') . '.pdf';
$mpdf->Output($ruta);
?>
<script language="JavaScript">
    window.open('<?php echo base_url . $ruta; ?>','_top','toolbar=yes,location=yes,status=yes,menubar=yes,personalbar=yes,scrollbars=yes,resizable=yes');
</script>


