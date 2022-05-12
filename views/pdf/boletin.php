<?php

include 'MPDF56/mpdf.php';

$mpdf = new mPDF('', // mode - default ''
    'letter', // format - A4, for example, default ''
    9, // font size - default 0
    'sans', // default font family
    4, // margin_left
    4, // margin right
    10, // margin top
    10, // margin bottom
    9, // margin header
    9, // margin footer
    'P'); // L - landscape, P - portrait

$mpdf->AddPage('P');
    $html = '
        <div id="details" class="clearfix">
            <div id="client">
            <table class="info-colegio-boletin">
                <tbody>
                    <tr>
                        <td>
                            <span class="info-colegio-boletin">CONCENTRACION DE DESAROLLO RURAL CDR</span> <small>Valle de San José</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="info-colegio-boletin">NIT: 132654789</span>
                        </td>
                    </tr>
                    <tr>
                         <td>
                            <span class="info-colegio-boletin">INFORME EVALUATIVO</span>
                        </td>
                    </tr>
                </table>
                <table class="datos-boletin">
                    <thead>
                        <tr>
                            <td scope="col" class="td-datos-boletin"><span class="texto-principal">'.$informacionUsuarios->nombre_e.' '. $informacionUsuarios->apellidos_e.'</span></td>
                            <td scope="col" class="td-datos-boletin"><span class="texto-principal">'.$informacionUsuarios->nombre_g.'</span></td>
                            <td scope="col" class="td-datos-boletin"><span class="texto-principal">'.Utils::validarPeriodoAcademico(date("Y-m-d")).'</span></td>
                            <td scope="col" class="td-datos-boletin"><span class="texto-principal">'.date("Y-m-d").'</span></td>
                            <td scope="col" class="td-datos-boletin"><span class="texto-principal">'.$informacionUsuarios->nombre_d.' '. $informacionUsuarios->apellidos_d.'</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-datos-boletin">Estudiante</td>
                            <td class="td-datos-boletin">Grado</td>
                            <td class="td-datos-boletin">Periodo</td>
                            <td class="td-datos-boletin">Año escolar</td>
                            <td class="td-datos-boletin">Director(a) de grupo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="invoice">
                <img class="logo-boletin" src="helpers/img/escudo_base.jpg">
            </div>
        </div>
        <hr>
        <table class="tabla-boletin">
            <thead>
                <tr>
                    <th class="td-items-boletin">Materias</th>
                    <th class="td-items-boletin">Observaciones</th>
                    <th class="td-items-boletin">Docentes</th>
                    <th class="td-items-boletin">R</th>
                    <th class="td-items-boletin">P1</th>
                    <th class="td-items-boletin">P2</th>
                    <th class="td-items-boletin">P3</th>
                    <th class="td-items-boletin">Pro</th>
                    <th class="td-items-boletin">Desempeño</th>
                    <th class="td-items-boletin">Fallas</th>
                </tr>
            </thead>
            <tbody>';
            while($materias = $periodox->fetchObject()):
                $html.='<tr>
                    <td class="td-items-boletin">'.$materias->nombre_materia.'</td>
                    <td class="td-items-boletin texto-observacion">'.$materias->observaciones.'</td>
                    <td class="td-items-boletin">'.$materias->nombre_docente.'</td>
                    <td class="td-items-boletin texto-center">'.$materias->recuperacion_nota.'</td>
                    <td class="td-items-boletin texto-center">'.$materias->nota_periodo1.'</td>
                    <td class="td-items-boletin texto-center">'.$materias->nota_periodo2.'</td>
                    <td class="td-items-boletin texto-center">'.$materias->nota_periodo3.'</td>
                    <td class="td-items-boletin texto-center">'.$materias->promedio_materia.'</td>
                    <td class="td-items-boletin texto-center">ALTO</td>
                    <td class="td-items-boletin texto-center">'.$materias->total_fallas_periodo.'</td>
                </tr>';
            endwhile;
            $html .='</tbody>
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


