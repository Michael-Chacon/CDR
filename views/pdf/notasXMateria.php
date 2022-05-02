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
if($listado_notas->rowCount()  != 0):
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
        <hr>';
        $html .= '<div class="asunto">
            <td class="asunto"><span class="subtitulo-head">Notas definitivas de la materia '.$nombre_materia.'  '.$nombre_grado.'°</span></td>
        </div>
        <table class="tabla-notas_definitivas">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Estudiante
                    </th>
                    <th>
                        Nota
                    </th>
                    <th>
                        Valoracón
                    </th>
                    <th>
                        Estado
                    </th>
                </tr>
            </thead>
            <tboby>';
            $c = 1;
                while($notas = $listado_notas->fetchObject()):
                    $html .= '<tr>
                        <td class="valores-notas">
                            <span class="texto-notas-definitivas">'.$c++.'</span>
                        </td>
                        <td class="valores-notas">
                           <span class="texto-notas-definitivas">'.$notas->apellidos_e.' '.$notas->nombre_e.'</span>
                        </td>
                        <td class="valores-notas">
                            <span class="texto-notas-definitivas">'.$notas->nota_definitiva.'</span>
                        </td>
                        <td class="valores-notas">
                        <span class="texto-notas-definitivas">';
                            if($notas->nota_definitiva >= 0 &&  $notas->nota_definitiva <= 31):
                                $html .= 'BAJO';
                            elseif($notas->nota_definitiva >= 32 &&  $notas->nota_definitiva <= 39):
                                $html .= 'BÁSICO';
                            elseif($notas->nota_definitiva >= 40 &&  $notas->nota_definitiva <= 45):
                                $html .= 'ALTO';
                            elseif($notas->nota_definitiva >= 46 &&  $notas->nota_definitiva <= 50):
                                $html .= 'SUPERIOR';
                            endif;
                        $html .= '</span></td>
                        <td class="valores-notas">
                        <span class="texto-notas-definitivas">';
                            if($notas->nota_definitiva < 30):
                                $html .= 'REPROBÓ';
                            elseif($notas->nota_definitiva >= 30):
                                $html .= 'APROBÓ';
                            endif;
                        $html .= '</span></td>
                    </tr>';
                endwhile;
            $html .= '</tbody>
        </table>
        ';
else:
    $html = '
        <div class="alerta">
            No hay estudiantes en este grado.
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


