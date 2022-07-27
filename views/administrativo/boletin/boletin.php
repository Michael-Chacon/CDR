<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Boletín de notas periodo <?=$periodo?>
			</h1>
		</article>
	</section>
</section>
<section class="container-fluid">
     <section class="row mt-5 mb-5 justify-content-center">
        <?php if(!empty($informacionUsuarios->nombre_e)): ?>
            <!--  Datos del estudiante -->
        <article class="col-md-4 mb-3">
            <div class="card shadow" >
              <div class="card-body">
                 <div class="text-center">
                   <?php if ($informacionUsuarios->photo == null): ?>
                        <img alt="" class="avatar circulo" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                    <?php else: ?>
                        <img alt="" class="avatar circulo" src="<?=base_url?>photos/estudiantes/<?=$informacionUsuarios->photo?>"></img>
                    <?php endif;?>
                    <h5 class="card-title mt-3 titulo-boletin"><?=$informacionUsuarios->nombre_e?> <?=$informacionUsuarios->apellidos_e?></h5>
                    <h6 class="card-subtitle mb-2 subtitulo">Estudiante</h6>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-md-4 text-center">
                        <h5 class="card-title titulo-boletin"><?=date("Y")?></h5>
                        <h6 class="card-subtitle mb-2 subtitulo">Año escolar</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="card-title titulo-boletin"><?=$informacionUsuarios->nombre_g?></h5>
                        <h6 class="card-subtitle mb-2 subtitulo">Grado</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="card-title titulo-boletin"><?=Utils::validarPeriodoAcademico(date("Y-m-d"))?></h5>
                        <h6 class="card-subtitle mb-2 subtitulo">Periodo</h6>
                    </div>
                </div>
            </div>
        </div>
        </article>
        <!-- Datos del director de grado -->
        <article class="col-md-4 mb-3">
            <div class="card shadow" >
              <div class="card-body">
                <div class="text-center mt-4 mb-3">
                    <?php if ($informacionUsuarios->img == null): ?>
                        <img alt="" class="avatar circulo" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                    <?php else: ?>
                       <img alt="" class="avatar circulo" src="<?=base_url?>photos/docentes/<?=$informacionUsuarios->img?>"></img>
                    <?php endif;?>
                    <h5 class="card-title mt-3 titulo-boletin"><?=$informacionUsuarios->nombre_d?> <?=$informacionUsuarios->apellidos_d?></h5>
                    <h6 class="card-subtitle mb-2 subtitulo">Director(a) de grupo</h6>
                    <br/>
                </div>
            </div>
        </div>
        </article>
    <?php else: ?>
        <div class="alert alert-light text-center" role="alert">
            El grado no tiene un director asignado
      </div>
    <?php endif; ?>
        <article class="col-md-4 mb-3">
            <div class="card shadow">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center titulo-boletin">P1</th>
                                <th class="text-center titulo-boletin">P2</th>
                                <th class="text-center titulo-boletin">P3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="font-weight: 400;">PUESTO EN EL GRUPO</th>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo1->puesto)):?>
                                        <?=$infoBoletinPeriodo1->puesto?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo2->puesto)):?>
                                        <?=$infoBoletinPeriodo2->puesto?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo3->puesto)):?>
                                        <?=$infoBoletinPeriodo3->puesto?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight: 400;">PROMEDIO ESTUDIANTE</th>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo1->promedio)):?>
                                        <?=$infoBoletinPeriodo1->promedio?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo2->promedio)):?>
                                        <?=$infoBoletinPeriodo2->promedio?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo3->promedio)):?>
                                        <?=$infoBoletinPeriodo3->promedio?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight: 400;">ASIGNATURAS PERDIDAS</th>
                                 <td class="text-center">
                                    <?php if(!empty($perdidasPeriodo1->perdidas1)):?>
                                        <?=$perdidasPeriodo1->perdidas1?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($perdidasPeriodo2->perdidas1)):?>
                                        <?=$perdidasPeriodo2->perdidas1?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($perdidasPeriodo3->perdidas1)):?>
                                        <?=$perdidasPeriodo3->perdidas1?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight: 400;">TOTAL DE FALLAS</th>
                                <td class="text-center">
                                    <?php if(!empty($fallasPeriodo1->total)):?>
                                        <?=$fallasPeriodo1->total?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($fallasPeriodo2->total)):?>
                                        <?=$fallasPeriodo2->total?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($fallasPeriodo3->total)):?>
                                        <?=$fallasPeriodo3->total?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </article>
    </section>
            <!-- inicio contenido -->
            		<section class="row mb-5">
            			<article class="col-lg-12">
            				<?php if ($areaMatermaticas->rowCount() != 0): ?>
                                <?php if(!isset($_SESSION['student'])): ?>
                                <a type="button" href="<?=base_url?>Boletin/verBoletin&student=<?=Utils::encryption($estudiante)?>&degree=<?=Utils::encryption($grado)?>&period=<?=Utils::encryption($periodo)?>&pdf=b" class="btn btn-outline-success"><i class="bi bi-cloud-arrow-down"></i> Descargar boletín
                                </a>
                            <?php endif ?>
            				<div class="table-responsive">
            				<table class="table table-bordered mt-3 mb-3 shadow">
            					<thead class="text-center">
            						<tr>
            							<th>Materias</th>
            							<th>Observaciones</th>
            							<th>Docente</th>
            							<th>R</th>
            							<th>P1</th>
            							<th>P2</th>
            							<th>P3</th>
            							<th>Pro</th>
            							<th>Desempeño</th>
            							<th>Fallas</th>
            						</tr>
            					</thead>
            					<tbody>
                                    <tr>
                                        <th class="text-center">MATEMÁTICAS</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?=$notaMatematicas?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
            						<?php while ($matematicas = $areaMatermaticas->fetchObject()): ?>
            							<tr>
            								<td class="text-center"><?=$matematicas->nombre_materia?></td>
            								<td><?=$matematicas->observaciones?></td>
            								<td><?=$matematicas->nombre_docente?></td>
            								<td class="text-center"><?=$matematicas->recuperacion_nota?></td>
            								<td class="text-center"><?=$matematicas->nota_periodo1?></td>
            								<td class="text-center"><?=$matematicas->nota_periodo2?></td>
            								<td class="text-center"><?=$matematicas->nota_periodo3?></td>
            								<td class="text-center"><?=$matematicas->promedio_materia?></td>
            								<td class="text-center">
                                                <?php if ($matematicas->nota_periodo1 >= 0 && $matematicas->nota_periodo1 <= 31): ?>
                                                BAJO
                                                <?php elseif ($matematicas->nota_periodo1 >= 32 && $matematicas->nota_periodo1 <= 39): ?>
                                                BÁSICO
                                                <?php elseif ($matematicas->nota_periodo1 >= 40 && $matematicas->nota_periodo1 <= 45): ?>
                                                ALTO
                                                <?php elseif ($matematicas->nota_periodo1 >= 46 && $matematicas->nota_periodo1 <= 50): ?>
                                                SUPERIOR
                                                <?php endif;?>
                                            </td>
            								<td class="text-center"><?=$matematicas->total_fallas_periodo?></td>
            							</tr>
            						<?php endwhile;?>
                                     <tr>
                                        <th class="text-center">HUMANIDADES, LENGUAJE CASTELLANO</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?=$notaHumanidades?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php while ($humanidades = $areaHumanidades->fetchObject()): ?>
                                        <tr>
                                            <td class="text-center"><?=$humanidades->nombre_materia?></td>
                                            <td><?=$humanidades->observaciones?></td>
                                            <td><?=$humanidades->nombre_docente?></td>
                                            <td class="text-center"><?=$humanidades->recuperacion_nota?></td>
                                            <td class="text-center"><?=$humanidades->nota_periodo1?></td>
                                            <td class="text-center"><?=$humanidades->nota_periodo2?></td>
                                            <td class="text-center"><?=$humanidades->nota_periodo3?></td>
                                            <td class="text-center"><?=$humanidades->promedio_materia?></td>
                                            <td class="text-center">
                                                <?php if ($humanidades->nota_periodo1 >= 0 && $humanidades->nota_periodo1 <= 31): ?>
                                                BAJO
                                                <?php elseif ($humanidades->nota_periodo1 >= 32 && $humanidades->nota_periodo1 <= 39): ?>
                                                BÁSICO
                                                <?php elseif ($humanidades->nota_periodo1 >= 40 && $humanidades->nota_periodo1 <= 45): ?>
                                                ALTO
                                                <?php elseif ($humanidades->nota_periodo1 >= 46 && $humanidades->nota_periodo1 <= 50): ?>
                                                SUPERIOR
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center"><?=$humanidades->total_fallas_periodo?></td>
                                        </tr>
                                    <?php endwhile;?>
                                    <tr>
                                        <th class="text-center">CIENCIAS NATURALES Y EDUCACIÓN AMBIENTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?=$notaCiencias?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php while ($ciencias_naturales = $areaCiencias->fetchObject()): ?>
                                        <tr>
                                            <td class="text-center"><?=$ciencias_naturales->nombre_materia?></td>
                                            <td><?=$ciencias_naturales->observaciones?></td>
                                            <td><?=$ciencias_naturales->nombre_docente?></td>
                                            <td class="text-center"><?=$ciencias_naturales->recuperacion_nota?></td>
                                            <td class="text-center"><?=$ciencias_naturales->nota_periodo1?></td>
                                            <td class="text-center"><?=$ciencias_naturales->nota_periodo2?></td>
                                            <td class="text-center"><?=$ciencias_naturales->nota_periodo3?></td>
                                            <td class="text-center"><?=$ciencias_naturales->promedio_materia?></td>
                                            <td class="text-center">
                                                <?php if ($ciencias_naturales->nota_periodo1 >= 0 && $ciencias_naturales->nota_periodo1 <= 31): ?>
                                                BAJO
                                                <?php elseif ($ciencias_naturales->nota_periodo1 >= 32 && $ciencias_naturales->nota_periodo1 <= 39): ?>
                                                BÁSICO
                                                <?php elseif ($ciencias_naturales->nota_periodo1 >= 40 && $ciencias_naturales->nota_periodo1 <= 45): ?>
                                                ALTO
                                                <?php elseif ($ciencias_naturales->nota_periodo1 >= 46 && $ciencias_naturales->nota_periodo1 <= 50): ?>
                                                SUPERIOR
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center"><?=$ciencias_naturales->total_fallas_periodo?></td>
                                        </tr>
                                    <?php endwhile;?>
                                    <tr>
                                        <th class="text-center">ÁREA TÉCNICA</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?=$notaTecnica?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php while ($modalidad = $areaTecnica->fetchObject()): ?>
                                        <tr>
                                            <td class="text-center"><?=$modalidad->nombre_materia?></td>
                                            <td><?=$modalidad->observaciones?></td>
                                            <td><?=$modalidad->nombre_docente?></td>
                                            <td class="text-center"><?=$modalidad->recuperacion_nota?></td>
                                            <td class="text-center"><?=$modalidad->nota_periodo1?></td>
                                            <td class="text-center"><?=$modalidad->nota_periodo2?></td>
                                            <td class="text-center"><?=$modalidad->nota_periodo3?></td>
                                            <td class="text-center"><?=$modalidad->promedio_materia?></td>
                                            <td class="text-center">
                                                <?php if ($modalidad->nota_periodo1 >= 0 && $modalidad->nota_periodo1 <= 31): ?>
                                                BAJO
                                                <?php elseif ($modalidad->nota_periodo1 >= 32 && $modalidad->nota_periodo1 <= 39): ?>
                                                BÁSICO
                                                <?php elseif ($modalidad->nota_periodo1 >= 40 && $modalidad->nota_periodo1 <= 45): ?>
                                                ALTO
                                                <?php elseif ($modalidad->nota_periodo1 >= 46 && $modalidad->nota_periodo1 <= 50): ?>
                                                SUPERIOR
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center"><?=$modalidad->total_fallas_periodo?></td>
                                        </tr>
                                    <?php endwhile;?>
                                    <tr>
                                        <th class="text-center">SIN ÁREA</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php while ($demas = $sinArea->fetchObject()): ?>
                                        <tr>
                                            <td class="text-center"><?=$demas->nombre_materia?></td>
                                            <td><?=$demas->observaciones?></td>
                                            <td><?=$demas->nombre_docente?></td>
                                            <td class="text-center"><?=$demas->recuperacion_nota?></td>
                                            <td class="text-center"><?=$demas->nota_periodo1?></td>
                                            <td class="text-center"><?=$demas->nota_periodo2?></td>
                                            <td class="text-center"><?=$demas->nota_periodo3?></td>
                                            <td class="text-center"><?=$demas->promedio_materia?></td>
                                            <td class="text-center">
                                                <?php if ($demas->nota_periodo1 >= 0 && $demas->nota_periodo1 <= 31): ?>
                                                BAJO
                                                <?php elseif ($demas->nota_periodo1 >= 32 && $demas->nota_periodo1 <= 39): ?>
                                                BÁSICO
                                                <?php elseif ($demas->nota_periodo1 >= 40 && $demas->nota_periodo1 <= 45): ?>
                                                ALTO
                                                <?php elseif ($demas->nota_periodo1 >= 46 && $demas->nota_periodo1 <= 50): ?>
                                                SUPERIOR
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center"><?=$demas->total_fallas_periodo?></td>
                                        </tr>
                                    <?php endwhile;?>

            					</tbody>
            				</table>
            				</div>
            			<?php else: ?>
            				<div class="alert alert-danger text-center mt-5 mb-5" role="alert">
            					El boletín de notas del periodo  <?=$periodo?> aún no se ha generado
            				</div>
            			<?php endif;?>
            			</article>
            		</section>
            <!-- fin contenido -->

</section>