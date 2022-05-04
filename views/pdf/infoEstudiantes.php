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
        <td class="asunto"><span class="subtitulo-head">Información del estudiante</span></td>
    </div>
    <br>
    <div class="datos">
        <table class="tabla-estudiante-padres">
            <tbody>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Nombre:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->nombre_e . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Apellidos:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->apellidos_e . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Fecha de nacimiento:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->fecha_nacimiento_e . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Edad:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . Utils::hallarEdad($dato->fecha_nacimiento_e) . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Grado:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->nombre_g . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Número de identificación:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->numero_e . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Lugar de expedición:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->lugar_expedicion_e . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Fecha de expedición:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->fecha_expedicion_e . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Dirección:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->direccion_e . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Telefono:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->telefono_e . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Correo:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->correo_e . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Incapacidad medica:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->incapacidad_medica_e . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>Grupo sanguineo:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->grupo_sanguineo_e . $dato->rh_e . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Transporte escolar:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->transporte . '</span>
                    </td>
                </tr>
                <tr>
                    <td class="items">
                        <span class="person person-item"><strong>PAE:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->pae . '</span>
                    </td>
                    <td class="items">
                        <span class="person person-item"><strong>Número resolución de posesión:</strong></span>
                    </td>
                    <td class="items">
                        <span class="person person-valor">' . $dato->numero_resolucion_posesion_per . '</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <hr>
        <div class="asunto">
            <td class="asunto"><span class="subtitulo-head">Información de la mamá</span></td>
        </div>';
        if(!empty($dato->nombre_m)):
        $html .= '
            <table class="tabla-estudiante-padres">
                <tbody>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Nombre:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->nombre_m . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Apellidos:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->apellidos_m . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Fecha de nacimiento:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->fecha_nacimiento_m . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Edad:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . Utils::hallarEdad($dato->fecha_nacimiento_m) . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Ocupación:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->ocupacion_m . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Número de identificación:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->numero_m . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Lugar de expedición:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->lugar_expedicion_m . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Fecha de expedición:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->fecha_expedicion_m . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Telefono:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->telefono_m . '</span>
                        </td>
                    </tr>
                </tbody>
            </table>';
        else:
            $html .= '<div class="vacio">
                <td class="td-vacio"><span class="texto-vacio">No hay información de la mamá</span></td>
            </div>';
        endif;
        $html .= '<hr><div class="asunto">
            <td class="asunto"><span class="subtitulo-head">Información del papá</span></td>
        </div>';
        if(!empty($dato->nombre_p)):
        $html .= '
            <table class="tabla-estudiante-padres">
                <tbody>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Nombre:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->nombre_p . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Apellidos:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->apellidos_p . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Fecha de nacimiento:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->fecha_nacimiento_p . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Edad:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . Utils::hallarEdad($dato->fecha_nacimiento_p) . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Ocupación:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->ocupacion_p . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Número de identificación:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->numero_p . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Lugar de expedición:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->lugar_expedicion_p . '</span>
                        </td>
                        <td class="items">
                            <span class="person person-item"><strong>Fecha de expedición:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->fecha_expedicion_p . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="items">
                            <span class="person person-item"><strong>Telefono:</strong></span>
                        </td>
                        <td class="items">
                            <span class="person person-valor">' . $dato->telefono_p . '</span>
                        </td>
                    </tr>
                </tbody>
            </table>';
        else:
            $html .= '<div class="vacio">
                <td class="td-vacio"><span class="texto-vacio">No hay información del papá</span></td>
            </div>';
        endif;
    $html .= '</div>
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
