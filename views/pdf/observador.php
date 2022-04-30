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
    100, // margin footer
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
	<div class="asunto">
      	<td class="asunto"><span class="subtitulo-head"> Observador del estudiante</span></td>
    </div>
    <table class="datos-observacion">
    	<tbody>
    		<tr>
    			<td><strong class="item">Observación realizada por:</strong></td>
    			<td><span class="datos"> ' . $observacion->docente . ' </span></td>
    		</tr>
    		<tr>
    			<td><strong class="item">Observación realizada a:</strong></td>
    			<td><span class="datos"> ' . $observacion->estudiante . ' </span></td>
    		</tr>
    		<tr>
    			<td><strong class="item">Fecha de la observación:</strong></td>
    			<td><span class="datos"> ' . $observacion->fecha_ob . ' </span></td>
    		</tr>
    		<tr>
    			<td><strong class="item">Grado del estudiante:</strong></td>
    			<td><span class="datos"> ' . $observacion->grado . '° </span></td>
    		</tr>
    	</tbody>
    </table>
    <br>
    <div class="observacion">
    	<span class="titulo-items">
    		Observación:
    	</span>
    	<br>
    	<p class="texto">' . $observacion->observacion . '</p>
    </div>
    <div class="acciones">
    	<span class="titulo-items">
    		Acciones:
    	</span>
    	<p class="texto">' . $observacion->acciones . '</p>
    </div>
    <footer>
    	<table class="tal">
    		<tbody>
    			<tr class="tr-firmas">
    				<td class="firma">
    				</td>
    				<td class="firma">
    				</td>
    			</tr>
    			<tr class="tr-firmas">
    				<td class="item-firma">
    					Firma del docente
    				</td>
    				<td class="item-firma">
    					Firma del estudiante
    				</td>
    			</tr>
    		</tbody>
    	</table>
    </footer>
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


