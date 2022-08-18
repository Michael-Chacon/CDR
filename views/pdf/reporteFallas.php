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
            <td class="asunto"><span class="subtitulo-head">Reporte de fallas  '.$nombre.', '.$materia.' '. $grado.'</span></td>
        </div>
        <table class="tabla-fallas">
            <thead>
                <tr class="margen-titulo-fallas">
                    <th>
                        <span class="titulo-fallas">#</span>
                    </th>
                    <th>
                        <span class="titulo-fallas">Fecha</span>
                    </th>
                    <th>
                        <span class="titulo-fallas">Perido</span>
                    </th>
                </tr>
            </thead>
            <tbody>';
            $c = 1;
            while($falla = $listado_fallas->fetchObject()):
                $html .= '<tr>
                    <td class="datos-fallas">
                        <span class="texto-fallas">'.$c++.'</span>
                    </td>
                    <td class="datos-fallas">
                        <span class="texto-fallas">'.Utils::fechaCarbon($falla->fecha_falla).'</span>
                    </td>
                    <td class="datos-fallas">
                        <span class="texto-fallas">'.$falla->id_periodo_f.'</span>
                    </td>
                </tr>';
            endwhile    ;
            $html .= '</tbody>
        </table>
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


