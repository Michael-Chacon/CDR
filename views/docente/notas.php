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
                        <i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;">
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
    <!-- fin del header -->
    <section class="row justify-content-center">
        <?php echo Utils::general_alerts('registrarNota', 'Nota registrada con éxito.', ' El porcentaje de esta nota sobrepasa el límite del 100%') ?>
        <?php Utils::borrar_error('registrarNota');?>
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
                            <a href="<?=base_url?>Observador/vista_observador&id=<?=$estudiante->id?>&name=<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>&g=<?=$grado?>">
                                <small class="badge rounded-pill bg-primary">
                                    <?=$fallas->total?> Observaciones
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
                            <p class="text-center mt-3"><span class="badge bg-warning text-dark">Este estudiante no tiene fallas.</span></p>
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
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td scope="row" class="titulo-criterio cognitivo">Cognitivo (<?=$evaluacionPeriodo1->porcentaje_cognitivo?>%)</td>
                  <td class="cognitivo">Evaluación (<?=$evaluacionPeriodo1->porcentaje_evaluacion?>%)</td>
                  <td class="cognitivo"><?=$evaluacionPeriodo1->nota_evaluacion?></td>
                  <td class="text-center"><a href="google.com"  class="btn btn-secondary disabled" role="button" aria-disabled="true"><i class="bi bi-pen"></i></a></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="cognitivo">Trimestral (<?=$evaluacionPeriodo1->porcentaje_trimestral?>%)</td>
                  <td class="cognitivo"><?=$trimestralPeriodo1->nota_trimestral?></td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="total-nota"><strong>Total</strong></td>
                  <td class="total-nota"><strong>?</strong></td>
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
                  <td scope="row" class="titulo-criterio procedimental">Procedimental (<?=$trabajoIndividualPeriodo1->porcentaje_procedimental?>%)</td>
                  <td class="procedimental">Trabajo individual (<?=$trabajoIndividualPeriodo1->porcentaje_Tindividual?>%)</td>
                  <td class="procedimental">40</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row" ></td>
                  <td class="procedimental">Trabajo colaborativo (<?=$trabajoIndividualPeriodo1->porcentaje_Tcolaborativo?>%)</td>
                  <td class="procedimental"><?=$trabajoColaborativoPeriodo1->nota_Tcolaborativo?></td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class=" total-nota"><strong>Total</strong></td>
                  <td class=" total-nota"><strong>?</strong></td>
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
                  <td scope="row" class="titulo-criterio actitudinal">Actitudinal (<?=$apreciativaPeriodo1->porcentaje_actitudinal?>%)</td>
                  <td class="actitudinal">Apreciativa (<?=$apreciativaPeriodo1->porcentaje_apreciativa?>%)</td>
                  <td class="actitudinal"><?=$apreciativaPeriodo1->nota_apreciativa?></td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row" ></td>
                  <td class="actitudinal">Autoevaliación (<?=$apreciativaPeriodo1->porcentaje_autoevaluacion?>%)</td>
                  <td class="actitudinal"><?=$autoevaluacionPeriodo1->nota_autoevaluacion?></td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="total-nota"><strong>Total</strong></td>
                  <td class="total-nota"><strong>?</strong></td>
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
                    <th class="text-center" scope="col">Editar</th>
                    <th class="text-center" scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td scope="row" class="titulo-criterio cognitivo">Cognitivo (50%)</td>
                  <td class="cognitivo">Evaluación (30%)</td>
                  <td class="cognitivo">35</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="cognitivo">Trimestral (20%)</td>
                  <td class="cognitivo">38</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="total-nota"><strong>Total</strong></td>
                  <td class="total-nota"><strong>?</strong></td>
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
                  <td scope="row" class="titulo-criterio procedimental">Procedimental (30%)</td>
                  <td class="procedimental">Trabajo individual (15%)</td>
                  <td class="procedimental">40</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row" ></td>
                  <td class="procedimental">Trabajo colaborativo (15%)</td>
                  <td class="procedimental">37</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class=" total-nota"><strong>Total</strong></td>
                  <td class=" total-nota"><strong>?</strong></td>
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
                  <td scope="row" class="titulo-criterio actitudinal">Actitudinal (20%)</td>
                  <td class="actitudinal">Apreciativa (15%)</td>
                  <td class="actitudinal">35</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row" ></td>
                  <td class="actitudinal">Autoevaliación (5%)</td>
                  <td class="actitudinal">45</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="total-nota"><strong>Total</strong></td>
                  <td class="total-nota"><strong>?</strong></td>
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
                    <th class="text-center" scope="col">Editar</th>
                    <th class="text-center" scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td scope="row" class="titulo-criterio cognitivo">Cognitivo (50%)</td>
                  <td class="cognitivo">Evaluación (30%)</td>
                  <td class="cognitivo">35</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="cognitivo">Trimestral (20%)</td>
                  <td class="cognitivo">38</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="total-nota"><strong>Total</strong></td>
                  <td class="total-nota"><strong>?</strong></td>
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
                  <td scope="row" class="titulo-criterio procedimental">Procedimental (30%)</td>
                  <td class="procedimental">Trabajo individual (15%)</td>
                  <td class="procedimental">40</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row" ></td>
                  <td class="procedimental">Trabajo colaborativo (15%)</td>
                  <td class="procedimental">37</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class=" total-nota"><strong>Total</strong></td>
                  <td class=" total-nota"><strong>?</strong></td>
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
                  <td scope="row" class="titulo-criterio actitudinal">Actitudinal (20%)</td>
                  <td class="actitudinal">Apreciativa (15%)</td>
                  <td class="actitudinal">35</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row" ></td>
                  <td class="actitudinal">Autoevaliación (5%)</td>
                  <td class="actitudinal">45</td>
                  <td class="text-center"><i class="bi bi-pen"></i></td>
                  <td class="text-center"><i class="bi bi-trash"></i></td>
              </tr>
              <tr>
                  <td scope="row"></td>
                  <td class="total-nota"><strong>Total</strong></td>
                  <td class="total-nota"><strong>?</strong></td>
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