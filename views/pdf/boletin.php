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
                    <td class="td-items-boletin texto-center resaltar">Materias</td>
                    <td class="td-items-boletin texto-center resaltar">Observaciones</td>
                    <td class="td-items-boletin texto-center resaltar">Docentes</td>
                    <td class="td-items-boletin texto-center">R</td>
                    <td class="td-items-boletin texto-center">P1</td>
                    <td class="td-items-boletin texto-center">P2</td>
                    <td class="td-items-boletin texto-center">P3</td>
                    <td class="td-items-boletin texto-center">Pro</td>
                    <td class="td-items-boletin texto-center texto-observacion">Desempeño</td>
                    <td class="td-items-boletin texto-center">Fallas</td>
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
                    <td class="td-items-boletin texto-center">';
                        if ($periodo == 1) {
                            $desempeño = $materias->nota_periodo1;
                        }elseif ($periodo == 2) {
                            $desempeño = $materias->nota_periodo2;
                        }elseif ($periodo == 3) {
                            $desempeño = $materias->nota_periodo3;
                        }
                        echo $desempeño;
                         if ($desempeño >= 0 && $desempeño <= 31):
                            $html .= 'BAJO';
                         elseif ($desempeño >= 32 && $desempeño <= 39):
                            $html .= 'BÁSICO';
                         elseif ($desempeño >= 40 && $desempeño <= 45):
                            $html .= 'ALTO';
                         elseif ($desempeño >= 46 && $desempeño <= 50):
                            $html .= 'SUPERIOR';
                        endif;
                    $html .='</td>
                    <td class="td-items-boletin texto-center">'.$materias->total_fallas_periodo.'</td>
                </tr>';
            endwhile;
            $html .='</tbody>
        </table>

        <table class="tabla-firmas-datos">
            <tbody>
                <tr>
                    <td class="td-firmas"></td>
                    <td class="td-firmas">P1</td>
                    <td class="td-firmas">P2</td>
                    <td class="td-firmas">P3</td>
                </tr>
                <tr>
                    <td class="td-firmas">PUESTO EN EL GRUPO</td>
                    <td class="td-firmas texto-center espacio">';
                        if(!empty($infoBoletinPeriodo1->puesto)):
                            $html .= $infoBoletinPeriodo1->puesto;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center espacio">';
                        if(!empty($infoBoletinPeriodo2->puesto)):
                            $html .= $infoBoletinPeriodo2->puesto;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center espacio">';
                        if(!empty($infoBoletinPeriodo3->puesto)):
                            $html .= $infoBoletinPeriodo3->puesto;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                </tr>
                <tr>
                    <td class="td-firmas">PROMEDIO ESTUDIANTE</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($infoBoletinPeriodo1->promedio)):
                            $html .= $infoBoletinPeriodo1->promedio;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($infoBoletinPeriodo2->promedio)):
                            $html .= $infoBoletinPeriodo2->promedio;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($infoBoletinPeriodo3->promedio)):
                            $html .= $infoBoletinPeriodo3->promedio;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                </tr>
                <tr>
                    <td class="td-firmas">ASIGNATURAS PERDIDAS</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($infoBoletinPeriodo1->perdidas1)):
                            $html .= $infoBoletinPeriodo1->perdidas1;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($infoBoletinPeriodo2->perdidas1)):
                            $html .= $infoBoletinPeriodo2->perdidas1;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($infoBoletinPeriodo3->perdidas1)):
                            $html .= $infoBoletinPeriodo3->perdidas1;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                </tr>
                <tr>
                    <td class="td-firmas">TOTAL FALLAS</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($fallasPeriodo1->total)):
                            $html .= $fallasPeriodo1->total;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($fallasPeriodo2->total)):
                            $html .= $fallasPeriodo2->total;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                    <td class="td-firmas texto-center">';
                        if(!empty($fallasPeriodo2->total)):
                            $html .= $fallasPeriodo2->total;
                        else:
                            $html .= '0';
                        endif;
                $html .= '</td>
                </tr>
            </tbody>
        </table>
            <table class="table-firmas">
                <tr>
                    <td class="firmas firma"></td>
                    <td class="firmas firma"></td>
                </tr>
                <tr>
                    <td class="firmas texto-center">Firma rector(a)</td>
                    <td class="firmas texto-center">Firma director(a) de grupo</td>
                </tr>
            </table>
        <table class="observacion-final">
            <tbody>
                <tr>
                    <td class="td-observacion-final ob"></td>
                    <td class="td-observacion-final resultado"></td>
                </tr>
                <tr>
                    <td class="td-observacion-final texto-center">Observaciones</td>
                    <td class="td-observacion-final texto-center">Resultado final</td>
                </tr>
            </tbody>
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


