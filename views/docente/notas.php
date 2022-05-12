<section class="container-fluid">
    <section class="row shadow titulo">
        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
            <h1 class="text-center config">
                <i class="bi <?=$materia->icono?>"></i>
                <?=$materia->nombre_mat?> <?=$grado?>
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
    <section class="row justify-content-center">
        <?php echo Utils::general_alerts('registrarNota', 'Nota registrada con éxito.', ' El porcentaje de esta nota sobrepasa el límite del 100%') ?>
        <?php echo Utils::general_alerts('validarNota', '', 'En esta actividad ya se encuentra registrada una nota, si quieres actualizarla, elimina la nota existente y registra la nota nueva.') ?>
        <?php echo Utils::general_alerts('eliminarNota', 'La nota fue eliminia con éxito', 'Algo salió mal al intentar eliminar la nota, intentelo de nuevo'); ?>
        <?php echo Utils::general_alerts('guardarBoletin', 'La nota definitiva se ha enviado hacia el boletín con éxito', 'Algo salió mal al intentar enviar la nota definitiva al boletín, inténtelo de nuevo.'); ?>
        <?php Utils::borrar_error('registrarNota');
        Utils::borrar_error('validarNota');
        Utils::borrar_error('eliminarNota');
        Utils::borrar_error('guardarBoletin');?>
    </section>
    <!-- cambio -->
    <section class="row mt-3">
        <section class="col-md-4">
        <section class="perfil-notas">
            <div class="card shadow ">
                <div class="card-body text-center">
                    <div class="row">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <article class="flex-shrink-0 text-center mb-1">
                                    <?php if (empty($docente->img)): ?>
                                        <img alt="" class="avatar-perfil-d" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                                    <?php else: ?>
                                        <img alt="" class="avatar-perfil-d" src="<?=base_url?>photos/estudiantes/<?=$estudiante->img?>"></img>
                                    <?php endif;?>
                            </article>
                        </article>
                    </div>
                    <h5 class="card-subtitle  text-center">
                        <?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
                    </h5>
                    <p class="text-center subtitulo">Estudiante</p>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-outline-primary position-relative btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#listadoFallas">
                                Fallas <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?=$fallas->total?><span class="visually-hidden">unread messages</span></span>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a type="button" class="btn btn-outline-success position-relative btn-sm" href="<?=base_url?>Observador/vista_observador&id=<?=Utils::encryption($estudiante->id)?>&name=<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>&g=<?=Utils::encryption($grado)?>"> Observaciones
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?=$observador->total?><span class="visually-hidden">unread messages</span></span>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <?php $x = 1;
if ($x == 1): ?>
                    <?php if(isset($_SESSION['teacher'])): ?>
                        <div class="d-grid gap-2 mt-2 mb-3">
                          <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#boletin">¡Ya puedes generar el boletín!</button>
                      </div>
                  <?php endif ?>
                  <?php endif;?>
                    <p class="card-text indicador"><strong>Indicadores de la materia:</strong> <?=$materia->indicadores_mat?></p>
                    <p class="indicador"><strong>Área:</strong>
                        <?php if (!empty($docente->nombre_area)): ?>
                            <?=ucfirst(strtolower($docente->nombre_area))?>
                        <?php else: ?>
                            No hay docente
                        <?php endif;?>
                    </p>
                </div>
            </div>
        </section>
    </section>
    <!-- inicio de las notas -->
    <section class="col-md-8 mb-5 ">
        <article class="text-center">
            <span class="valor_item text-center mb-2">Notas</span>
        </article>
        <!-- inicio de notas por periodos -->
        <section class="accordion shadow mb-5 shadow" id="accordionPanelsStayOpenExample">
            <section class="accordion-item">
            <h2 class="accordion-header" id="1periodo">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#periodo1" aria-expanded="false" aria-controls="periodo1">
                Periodo 1
            </button>
            </h2>
            <article id="periodo1" class="accordion-collapse collapse" aria-labelledby="1periodo">
             <article class="accordion-body">
                <article class="row justify-content-center">
                    <article class="col-md-12 ">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Criterio</th>
                                <th scope="col">actividad</th>
                                <th scope="col">nota</th>
                                <?php if (isset($_SESSION['teacher'])): ?>
                                <th scope="col" class="text-center">Eliminar</th>
                                <?php endif;?>
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
                                <?php endif;?>
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
                                <?php endif;?>
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
                                <?php endif;?>
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
                                <?php endif;?>
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
                                <?php endif;?>
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
                                <?php endif;?>
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
                <article class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                            <th scope="col">Criterio</th>
                            <th scope="col">actividad</th>
                            <th scope="col">nota</th>
                            <?php if (isset($_SESSION['teacher'])): ?>
                            <th class="text-center" scope="col">Eliminar</th>
                        <?php endif;?>
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
                    <?php endif;?>
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
                <?php endif;?>
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
            <?php endif;?>
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
        <?php endif;?>
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
        <?php endif;?>
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
        <?php endif;?>
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
                <article class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                            <th scope="col">Criterio</th>
                            <th scope="col">actividad</th>
                            <th scope="col">nota</th>
                            <?php if (isset($_SESSION['teacher'])): ?>
                            <th class="text-center" scope="col">Eliminar</th>
                        <?php endif;?>
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
                    <?php endif;?>
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
                <?php endif;?>
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
            <?php endif;?>
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
        <?php endif;?>
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
        <?php endif;?>
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
        <?php endif;?>
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
    <!-- fin de las notas -->
    </section>
    <!-- fin del cambio -->
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
<!-- Modal  para mostrar el listado de fallas -->
<section class="modal fade" id="listadoFallas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporte de fallas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $f = 0;
if ($fechas_fallas->rowCount() != 0): ?>
                    <table class="table text-center caption-top table-responsive">
                        <caption>Formato de fecha: aaaa/mm/dd</caption>
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
                    <?php if (!isset($_SESSION['student'])): ?>
                        <div class="d-grid gap-2">
                        <a href="<?=base_url?>Pdf/listadoFallas&student=<?=$estudiante->id?>&id_subject=<?=$materia->id?>&subject=<?=$materia->nombre_mat?>&degree=<?=$grado?>&name=<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>" class="btn btn-warning" type="button">Descargar reporte de fallas</a>
                    </div>
                    <?php endif;?>
                <?php else: ?>
                    <div class="alert alert-danger text-center" role="alert">
                        El estudiante no tiene fallas.
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<!-- fin de nueva nota -->

<!-- Modal para registrar el boletin-->
<section class="modal fade" id="boletin" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Boletín de notas periodo <?=$periodo?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url?>Boletin/guardarBoletin" method="post">
                <div class="modal-body">
                    <input type="text" hidden name="nGrado" value="<?=$grado?>">
                    <input type="number" hidden name="estudiante" value="<?=$estudiante->id?>">
                    <input type="number" hidden name="materia" value="<?=$id_materia?>">
                    <input type="number" hidden name="area" value="<?=$docente->id_area?>">
                    <input type="number" hidden name="periodo" value="<?=$periodo?>">
                    <input type="text" hidden name="nombre_materia" value="<?=$materia->nombre_mat?>">
                    <input type="text"  hidden name="nombre_estudiante" value="<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>">
                    <input type="text" hidden name="docente" value="<?=$_SESSION['teacher']->nombre_d?> <?=$_SESSION['teacher']->apellidos_d?>">
                    <input type="number" hidden name="fallas" value="<?=$fallas_por_periodo->fallas_periodo?>">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Observaciones:</label>
                        <div class="form-floating">
                          <textarea class="form-control" name="observacion" placeholder="Leave a comment here" id="floatingTextarea" style="height: 80px" required></textarea>
                          <label for="floatingTextarea"></label>
                      </div>
                    </div>
                    <div class="row text-center">
                        <span class="valor_item mb-2">Notas </span>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nota1" class="form-label">Periodo 1:</label>
                                <input type="text" readonly class="form-control" id="nota1" placeholder="Nota" name="periodo1" value="<?=$definitiva_periodo1?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nota2" class="form-label">Periodo 2:</label>
                                <input type="text" readonly class="form-control" id="nota2" placeholder="Nota" name="periodo2" value="<?=$definitiva_periodo2?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nota3" class="form-label">Periodo 3:</label>
                                <input type="text" readonly class="form-control" id="nota3" placeholder="Nota" name="periodo3" value="<?=$definitiva_periodo3?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-check mt-3 mb-3">
                      <input class="form-check-input" type="checkbox" value="yes" id="flexCheckDefault" name="recuperacion">
                      <label class="form-check-label" for="flexCheckDefault">
                        ¿El estudiante tuvo que recuperar la nota?
                    </label>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Enviar nota al boletín</button>
                </div>
            </form>
        </div>
    </div>
</section>