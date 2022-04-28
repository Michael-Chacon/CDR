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
<table class="table-head">
  <tbody>
    <tr class="tr-head">
      <td class="td-head"><p class="titulo-head">Concentracion de desarrollo rural (CDR)</p></td>
    </tr>
    <tr class="tr-head">
      <td class="td-head"><span class="subtitulo-head"> Listado de estudiantes del grado <strong>6</strong>, fecha de corte: <strong>02/22/2022</strong></span></td>
    </tr>
  </tbody>
</table>
<hr>
<table class="estudiantes-grado">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Estudiante</th>
      <th scope="col">Identificación</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="linea numero">1</td>
      <td class="linea"><span class="nombre-numero">Michael Alexis Chacón Marín</td>
      <td class="linea"><span class="nombre-numero">1103365268</td>
    </tr>
    <tr>
      <td class="linea">2</td>
      <td class="linea"><span class="nombre-numero">Briand Johan Porras Vargas</span></td>
      <td class="linea"><span class="nombre-numero">1103654987</span></td>
    </tr>
    <tr>
      <td class="linea">3</td>
      <td class="linea"><span class="nombre-numero">Larry the Bird Idiot</span></td>
      <td class="linea"><span class="nombre-numero">012345687</span></td>
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


