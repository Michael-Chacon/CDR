<section class="container-fluid">
    <section class="row shadow titulo">
        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
            <h1 class="text-center config">
                <i class="bi <?=$materia->icono?>"></i>
                <?=$materia->nombre_mat?> <?=$grado?>°
            </h1>
        </article>
        <?php if (isset($_SESSION['teacher'])): ?>
            <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                <acticle class="btn-group dropstart">
                    <a aria-expanded="false" class="" data-bs-toggle="dropdown" type="button">
                        <i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;" data-bs-toggle="tooltip" data-bs-placement="left" title="Menú">
                        </i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" data-bs-target="#newNote" data-bs-toggle="modal" href="#">
                                <i class="bi bi-book-half">
                                </i>
                                Nueva nota
                            </a>
                        </li>
                    </ul>
                </acticle>
            </article>
        <?php else: ?>
        <?php endif;?>
    </section>
    <h2 class="visually-hidden">Title for screen readers</h2>
<a class="visually-hidden-focusable" href="#content">Skip to main content</a>
<div class="visually-hidden-focusable">A container with a <a href="#">focusable element</a>.</div>
    <!-- fin del header -->
    <section class="row justify-content-center">
        <?php echo Utils::general_alerts('registrarNota', 'Nota registrada con éxito.', ' El porcentaje de esta nota sobrepasa el límite del 100%') ?>
        <?php echo Utils::general_alerts('validarNota', '', 'En esta actividad ya se encuentra registrada una nota, si quieres actualizarla, elimina la nota existente y registra la nota nueva.') ?>
        <?php echo Utils::general_alerts('eliminarNota', 'La nota fue eliminia con éxito', 'Algo salió mal al intentar eliminar la nota, intentelo de nuevo'); ?>

        <?php Utils::borrar_error('registrarNota');
Utils::borrar_error('validarNota');
Utils::borrar_error('eliminarNota');?>
        <article class="col-md-5 mt-5">
            <ul class="list-group list-group-flush shadow">
                <li class="list-group-item">
                    <article class="row">
                        <article class="col-md-7">
                            <span class="nombre_estudiante">
                                <?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
                            </span>
                        </article>
                        <article class="col-md-2">
                            <span class="badge rounded-pill bg-danger">
                                <?=$fallas->total?> fallas
                            </span>
                        </article>
                        <article class="col-md-3">
                            <a href="<?=base_url?>Observador/vista_observador&id=<?=Utils::encryption($estudiante->id)?>&name=<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>&g=<?=Utils::encryption($grado)?>">
                                <small class="badge rounded-pill bg-primary">
                                    <?=$observador->total?> Observaciones
                                </small>
                            </a>
                        </article>
                    </article>
                </li>
                <li class="list-group-item">
                    <h6>
                        Indicadores de la materia:
                    </h6>
                    <small>
                        <?=$materia->indicadores_mat?>
                    </small>
                </li>
            </ul>
        </article>
        <article class="col-md-5 mt-5 ">
            <!-- inicio acordeon -->
            <div class="accordion accordion-flush shadow" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button aria-controls="flush-collapseOne" aria-expanded="false" class="accordion-button collapsed text-center" data-bs-target="#flush-collapseOne" data-bs-toggle="collapse" type="button">
                            <span class="registro-fallas">Registro de inasistencias</span>
                        </button>
                    </h2>
                    <div aria-labelledby="flush-headingOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" id="flush-collapseOne">
                        <article class="accordion-body">
                            <?php $f = 0;
if ($fechas_fallas->rowCount() != 0): ?>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Fecha
                                            </th>
                                            <th>
                                                Periodo
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($fechas = $fechas_fallas->fetchObject()):
    $f++;
    ?>
					                                            <tr>
					                                                <td>
					                                                    <?=$f?>
					                                                </td>
					                                                <td>
					                                                    <?=$fechas->fecha_falla?>
					                                                </td>
					                                                <td>
					                                                    <?=$fechas->id_periodo_f?>
					                                                </td>
					                                            </tr>
					                                        <?php endwhile;?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-center mt-3"><span class="badge bg-warning text-dark">El estudiante no tiene fallas.</span></p>
                            <?php endif;?>
                        </table>
                    </article>
                </div>
            </div>
        </div>
        <!-- fin del acordeon -->
    </article>
</section>
<!-- fin indicador y contenido -->
<section class="row justify-content-center mt-5 mb-5">
    <h5 class="text-center">
        Notas
    </h5>
</section>
<!-- inicio de notas por periodos -->
<section class="accordion shadow mb-5" id="accordionPanelsStayOpenExample">
  <section class="accordion-item">
    <h2 class="accordion-header" id="1periodo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#periodo1" aria-expanded="true" aria-controls="periodo1">
        Periodo 1
    </button>
</h2>
<article id="periodo1" class="accordion-collapse collapse show" aria-labelledby="1periodo">
  <article class="accordion-body">
    <article class="row justify-content-center">
        <article class="col-md-8 shadow">
            <table class="table ">
              <thead>
                <tr>
                    <th scope="col">Criterio</th>
                    <th scope="col">actividad</th>
                    <th scope="col">nota</th>
                    <?php if (isset($_SESSION['teacher'])): ?>
                    <th scope="col" class="text-center">Eliminar</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="titulo-criterio cognitivo">Cognitivo (<?=$cognitivo->porcentaje_cognitivo?>%)</td>
                    <td class="cognitivo">Evaluación (<?=$cognitivo->porcentaje_evaluacion?>%)</td>
                    <td class="cognitivo">
                      <?php if (empty($evaluacionPeriodo1->nota_evaluacion)): ?>
                        0
                    <?php else: ?>
                        <?=$evaluacionPeriodo1->nota_evaluacion?>
                    <?php endif;?>
                </td>
                    <?php if (isset($_SESSION['teacher'])): ?>
                <td class="text-center">
                    <a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=evaluacion&id=<?=$evaluacionPeriodo1->id_evaluacion?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$uno?>"><i class="bi bi-trash efecto_hover"></i>
                    </a>
                </td>
            <?php endif; ?>
            </tr>
            <tr>
              <td scope="row"></td>
              <td class="cognitivo">Trimestral (<?=$cognitivo->porcentaje_trimestral?>%)</td>
              <td class="cognitivo">
                  <?php if (empty($trimestralPeriodo1->nota_trimestral)): ?>
                    0
                <?php else: ?>
                    <?=$trimestralPeriodo1->nota_trimestral?>
                <?php endif;?>
            </td>
             <?php if (isset($_SESSION['teacher'])): ?>
            <td class="text-center">
                <a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=trimestral&id=<?=$trimestralPeriodo1->id_trimestral?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>"  class="<?=$uno?>"><i class="bi bi-trash efecto_hover"></i></a>
            </td>
        <?php endif; ?>
        </tr>
        <tr>
          <td scope="row"></td>
          <td class="total-nota"><strong>Total</strong></td>
          <td class="total-nota"><strong><?=$definitiva_cognitivoUno?></strong></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
          <td scope="row"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      </tr>
      <!-- procedimental -->
      <tr>
          <td scope="row" class="titulo-criterio procedimental">Procedimental (<?=$procedimental->porcentaje_procedimental?>%)</td>
          <td class="procedimental">Trabajo individual (<?=$procedimental->porcentaje_Tindividual?>%)</td>
          <td class="procedimental">
              <?php if (empty($trabajoIndividualPeriodo1->nota_Tindividual)): ?>
                0
            <?php else: ?>
                <?=$trabajoIndividualPeriodo1->nota_Tindividual?>
            <?php endif;?>
        </td>
        <?php if (isset($_SESSION['teacher'])): ?>
        <td class="text-center">
                <a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=tindividual&id=<?=$trabajoIndividualPeriodo1->id_Tindividual?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$uno?>"><i class="bi bi-trash efecto_hover"></i></a></td>
        <?php endif; ?>
        </tr>
    <tr>
      <td scope="row" ></td>
      <td class="procedimental">Trabajo colaborativo (<?=$procedimental->porcentaje_Tcolaborativo?>%)</td>
      <td class="procedimental">
          <?php if (empty($trabajoColaborativoPeriodo1->nota_Tcolaborativo)): ?>
            0
        <?php else: ?>
            <?=$trabajoColaborativoPeriodo1->nota_Tcolaborativo?>
        <?php endif;?>
    </td>
    <?php if (isset($_SESSION['teacher'])): ?>
    <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=tcolaborativo&id=<?=$trabajoColaborativoPeriodo1->id_Tcolaborativo?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$uno?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row"></td>
  <td class=" total-nota"><strong>Total</strong></td>
  <td class=" total-nota"><strong><?=$definitiva_procedimentalUno?></strong></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row"></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<!-- actitudinal -->
<tr>
  <td scope="row" class="titulo-criterio actitudinal">Actitudinal (<?=$actitudinal->porcentaje_actitudinal?>%)</td>
  <td class="actitudinal">Apreciativa (<?=$actitudinal->porcentaje_apreciativa?>%)</td>
  <td class="actitudinal">
    <?php if (empty($apreciativaPeriodo1->nota_apreciativa)): ?>
        0
    <?php else: ?>
        <?=$apreciativaPeriodo1->nota_apreciativa?>
    <?php endif;?>
</td>
<?php if (isset($_SESSION['teacher'])): ?>
<td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=apreciativa&id=<?=$apreciativaPeriodo1->id_apreciativa?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$uno?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row" ></td>
  <td class="actitudinal">Autoevaliación (<?=$actitudinal->porcentaje_autoevaluacion?>%)</td>
  <td class="actitudinal">
    <?php if (empty($autoevaluacionPeriodo1->nota_autoevaluacion)): ?>
        0
    <?php else: ?>
        <?=$autoevaluacionPeriodo1->nota_autoevaluacion?>
    <?php endif;?>
</td>
<?php if (isset($_SESSION['teacher'])): ?>
<td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=autoevaluacion&id=<?=$autoevaluacionPeriodo1->id_autoevaluacion?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$uno?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row"></td>
  <td class="total-nota"><strong>Total</strong></td>
  <td class="total-nota"><strong><?=$definitiva_actitudinalUno?></strong></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row"></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row">DEFINITIVA</td>
  <td class="total-nota"><strong><?=$definitiva_periodo1?></strong></td>
  <td class="total-nota"><strong></strong></td>
  <td></td>
  <td></td>
</tr>
</tbody>
</table>
</article>
</article>
</article>
</article>
</section>
<div class="accordion-item">
    <h2 class="accordion-header" id="2periodo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#periodo2" aria-expanded="false" aria-controls="periodo2">
        Periodo 2
    </button>
</h2>
<div id="periodo2" class="accordion-collapse collapse" aria-labelledby="2periodo">
  <div class="accordion-body">
    <article class="row justify-content-center">
        <article class="col-md-8 shadow">
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">Criterio</th>
                    <th scope="col">actividad</th>
                    <th scope="col">nota</th>
                    <?php if (isset($_SESSION['teacher'])): ?>
                    <th class="text-center" scope="col">Eliminar</th>
                <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="titulo-criterio cognitivo">Cognitivo (<?=$cognitivo->porcentaje_cognitivo?>%)</td>
                    <td class="cognitivo">Evaluación (<?=$cognitivo->porcentaje_evaluacion?>%)</td>
                    <td class="cognitivo">
                      <?php if (empty($evaluacionPeriodo2->nota_evaluacion)): ?>
                        0
                    <?php else: ?>
                        <?=$evaluacionPeriodo2->nota_evaluacion?>
                    <?php endif;?>
                </td>
                <?php if (isset($_SESSION['teacher'])): ?>
                <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=evaluacion&id=<?=$evaluacionPeriodo2->id_evaluacion?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$dos?>"><i class="bi bi-trash efecto_hover"></i></a></td>
            <?php endif; ?>
            </tr>
            <tr>
              <td scope="row"></td>
              <td class="cognitivo">Trimestral (<?=$cognitivo->porcentaje_trimestral?>%)</td>
              <td class="cognitivo">
                  <?php if (empty($trimestralPeriodo2->nota_trimestral)): ?>
                    0
                <?php else: ?>
                    <?=$trimestralPeriodo2->nota_trimestral?>
                <?php endif;?>
            </td>
            <?php if (isset($_SESSION['teacher'])): ?>
            <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=trimestral&id=<?=$trimestralPeriodo2->id_trimestral?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$dos?>"><i class="bi bi-trash efecto_hover"></i></a></td>
        <?php endif; ?>
        </tr>
        <tr>
          <td scope="row"></td>
          <td class="total-nota"><strong>Total</strong></td>
          <td class="total-nota"><strong><?=$definitiva_cognitivoDos?></strong></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
          <td scope="row"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      </tr>
      <!-- procedimental -->
      <tr>
          <td scope="row" class="titulo-criterio procedimental">Procedimental (<?=$procedimental->porcentaje_procedimental?>%)</td>
          <td class="procedimental">Trabajo individual (<?=$procedimental->porcentaje_Tindividual?>%)</td>
          <td class="procedimental">
              <?php if (empty($trabajoIndividualPeriodo2->nota_Tindividual)): ?>
                0
            <?php else: ?>
                <?=$trabajoIndividualPeriodo2->nota_Tindividual?>
            <?php endif;?>
        </td>
        <?php if (isset($_SESSION['teacher'])): ?>
        <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=tindividual&id=<?=$trabajoIndividualPeriodo2->id_Tindividual?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$dos?>"><i class="bi bi-trash efecto_hover"></i></a></td>
    <?php endif; ?>
    </tr>
    <tr>
      <td scope="row" ></td>
      <td class="procedimental">Trabajo colaborativo (<?=$procedimental->porcentaje_Tcolaborativo?>%)</td>
      <td class="procedimental">
          <?php if (empty($trabajoColaborativoPeriodo2->nota_Tcolaborativo)): ?>
            0
        <?php else: ?>
            <?=$trabajoColaborativoPeriodo2->nota_Tcolaborativo?>
        <?php endif;?>
    </td>
    <?php if (isset($_SESSION['teacher'])): ?>
    <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=tcolaborativo&id=<?=$trabajoColaborativoPeriodo2->id_Tcolaborativo?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$dos?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row"></td>
  <td class=" total-nota"><strong>Total</strong></td>
  <td class=" total-nota"><strong><?=$definitiva_procedimentalDos?></strong></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row"></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<!-- actitudinal -->
<tr>
  <td scope="row" class="titulo-criterio actitudinal">Actitudinal (<?=$actitudinal->porcentaje_actitudinal?>%)</td>
  <td class="actitudinal">Apreciativa (<?=$actitudinal->porcentaje_apreciativa?>%)</td>
  <td class="actitudinal">
    <?php if (empty($apreciativaPeriodo2->nota_apreciativa)): ?>
        0
    <?php else: ?>
        <?=$apreciativaPeriodo2->nota_apreciativa?>
    <?php endif;?>
</td>
<?php if (isset($_SESSION['teacher'])): ?>
<td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=apreciativa&id=<?=$apreciativaPeriodo2->id_apreciativa?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$dos?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php  endif;?>
</tr>
<tr>
  <td scope="row" ></td>
  <td class="actitudinal">Autoevaliación (<?=$actitudinal->porcentaje_autoevaluacion?>%)</td>
  <td class="actitudinal">
    <?php if (empty($autoevaluacionPeriodo2->nota_autoevaluacion)): ?>
        0
    <?php else: ?>
        <?=$autoevaluacionPeriodo2->nota_autoevaluacion?>
    <?php endif;?>

</td>
<?php if (isset($_SESSION['teacher'])): ?>
<td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=autoevaluacion&id=<?=$autoevaluacionPeriodo2->id_autoevaluacion?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$dos?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row"></td>
  <td class="total-nota"><strong>Total</strong></td>
  <td class="total-nota"><strong><?=$definitiva_actitudinalDos?></strong></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row"></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row">DEFINITIVA</td>
  <td class="total-nota"><strong><?=$definitiva_periodo2?></strong></td>
  <td class="total-nota"><strong></strong></td>
  <td></td>
  <td></td>
</tr>
</tbody>
</table>
</article>
</article>
</div>
</div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="periodo33">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#periodo3" aria-expanded="false" aria-controls="periodo3">
        Periodo 3
    </button>
</h2>
<div id="periodo3" class="accordion-collapse collapse" aria-labelledby="periodo33">
  <div class="accordion-body">
    <article class="row justify-content-center">
        <article class="col-md-8 shadow">
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">Criterio</th>
                    <th scope="col">actividad</th>
                    <th scope="col">nota</th>
                    <?php if (isset($_SESSION['teacher'])): ?>
                    <th class="text-center" scope="col">Eliminar</th>
                <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="titulo-criterio cognitivo">Cognitivo (<?=$cognitivo->porcentaje_cognitivo?>%)</td>
                    <td class="cognitivo">Evaluación (<?=$cognitivo->porcentaje_evaluacion?>%)</td>
                    <td class="cognitivo">
                      <?php if (empty($evaluacionPeriodo3->nota_evaluacion)): ?>
                        0
                    <?php else: ?>
                        <?=$evaluacionPeriodo3->nota_evaluacion?>
                    <?php endif;?>
                </td>
                <?php if (isset($_SESSION['teacher'])): ?>
                <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=evaluacion&id=<?=$evaluacionPeriodo3->id_evaluacion?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$tres?>"><i class="bi bi-trash efecto_hover"></i></a></td>
            <?php endif; ?>
            </tr>
            <tr>
              <td scope="row"></td>
              <td class="cognitivo">Trimestral (<?=$cognitivo->porcentaje_trimestral?>%)</td>
              <td class="cognitivo">
                  <?php if (empty($trimestralPeriodo3->nota_trimestral)): ?>
                    0
                <?php else: ?>
                    <?=$trimestralPeriodo3->nota_trimestral?>
                <?php endif;?>
            </td>
            <?php if (isset($_SESSION['teacher'])): ?>
            <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=trimestral&id=<?=$trimestralPeriodo3->id_trimestral?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$tres?>"><i class="bi bi-trash efecto_hover"></i></a></td>
        <?php endif; ?>
        </tr>
        <tr>
          <td scope="row"></td>
          <td class="total-nota"><strong>Total</strong></td>
          <td class="total-nota"><strong><?=$definitiva_cognitivoTres?></strong></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
          <td scope="row"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      </tr>
      <!-- procedimental -->
      <tr>
          <td scope="row" class="titulo-criterio procedimental">Procedimental (<?=$procedimental->porcentaje_procedimental?>%)</td>
          <td class="procedimental">Trabajo individual (<?=$procedimental->porcentaje_Tindividual?>%)</td>
          <td class="procedimental">
              <?php if (empty($trabajoIndividualPeriodo3->nota_Tindividual)): ?>
                0
            <?php else: ?>
                <?=$trabajoIndividualPeriodo3->nota_Tindividual?>
            <?php endif;?>
        </td>
        <?php if (isset($_SESSION['teacher'])): ?>
        <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=tindividual&id=<?=$trabajoIndividualPeriodo3->id_Tindividual?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$tres?>"><i class="bi bi-trash efecto_hover"></i></a></td>
    <?php endif; ?>
    </tr>
    <tr>
      <td scope="row" ></td>
      <td class="procedimental">Trabajo colaborativo (<?=$procedimental->porcentaje_Tcolaborativo?>%)</td>
      <td class="procedimental">
          <?php if (empty($trabajoColaborativoPeriodo3->nota_Tcolaborativo)): ?>
            0
        <?php else: ?>
            <?=$trabajoColaborativoPeriodo3->nota_Tcolaborativo?>
        <?php endif;?>
    </td>
    <?php if (isset($_SESSION['teacher'])): ?>
    <td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=tcolaborativo&id=<?=$trabajoColaborativoPeriodo3->id_Tcolaborativo?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$tres?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row"></td>
  <td class=" total-nota"><strong>Total</strong></td>
  <td class=" total-nota"><strong><?=$definitiva_procedimentalTres?></strong></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row"></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<!-- actitudinal -->
<tr>
  <td scope="row" class="titulo-criterio actitudinal">Actitudinal (<?=$actitudinal->porcentaje_actitudinal?>%)</td>
  <td class="actitudinal">Apreciativa (<?=$actitudinal->porcentaje_apreciativa?>%)</td>
  <td class="actitudinal">
    <?php if (empty($apreciativaPeriodo3->nota_apreciativa)): ?>
        0
    <?php else: ?>
        <?=$apreciativaPeriodo3->nota_apreciativa?>
    <?php endif;?>
</td>
<?php if (isset($_SESSION['teacher'])): ?>
<td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=apreciativa&id=<?=$apreciativaPeriodo3->id_apreciativa?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$tres?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row" ></td>
  <td class="actitudinal">Autoevaliación (<?=$actitudinal->porcentaje_autoevaluacion?>%)</td>
  <td class="actitudinal">
    <?php if (empty($autoevaluacionPeriodo3->nota_autoevaluacion)): ?>
        0
    <?php else: ?>
        <?=$autoevaluacionPeriodo3->nota_autoevaluacion?>
    <?php endif;?>

</td>
<?php if (isset($_SESSION['teacher'])): ?>
<td class="text-center"><a onclick="return confirm('¿Estás seguro de que deseas eliminar la nota?')" href="<?=base_url?>Notas/eliminarNota&activity=autoevaluacion&id=<?=$autoevaluacionPeriodo3->id_autoevaluacion?>&m=<?=$id_materia?>&g=<?=$grado?>&e=<?=$id_estudiante?>" class="<?=$tres?>"><i class="bi bi-trash efecto_hover"></i></a></td>
<?php endif; ?>
</tr>
<tr>
  <td scope="row"></td>
  <td class="total-nota"><strong>Total</strong></td>
  <td class="total-nota"><strong><?=$definitiva_actitudinalTres?></strong></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row"></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td scope="row">DEFINITIVA</td>
  <td class="total-nota"><strong><?=$definitiva_periodo3?></strong></td>
  <td class="total-nota"><strong></strong></td>
  <td></td>
  <td></td>
</tr>
</tbody>
</table>
</article>
</article>
</div>
</div>
</div>
</section>
<!--  fin periodos -->
</section>
<!-- Modal -->
<section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="newNote" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Asignar nueva nota
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                </button>
            </div>
            <form action="<?=base_url?>Notas/guardarNota" method="post">
                <input type="number" hidden name="estudiante"  value="<?=$estudiante->id?>">
                <input type="text" hidden name="materia" value="<?=$materia->id?>">
                <input type="number" hidden name="grado" value="<?=$grado?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="item">
                            ¿Qué actividad vas a calificar?
                        </label>
                        <select class="form-select" aria-label="actividad" name="actividad" required>
                          <option ></option>
                          <option value="evaluacion">Evaluacion</option>
                          <option value="trimestral">Trimestral</option>
                          <option value="tindividual">Trabajo individual</option>
                          <option value="tcolaborativo">Trabajo_colaborativo</option>
                          <option value="apreciativa">Apreciativo</option>
                          <option value="autoevaluacion">Autoevaliación</option>
                      </select>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nota">
                                Nota:
                            </label>
                            <input class="form-control" id="nota" placeholder="Nota" type="number" name="nota" required>
                        </input>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                Cancelar
            </button>
            <button class="btn btn-outline-success" type="submit">
                Registrar nota
            </button>
        </div>
    </form>
</div>
</div>
</section>
<!-- fin de nueva nota -->
        <!-- fin del contenido