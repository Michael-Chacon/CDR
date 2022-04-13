<section class="container-fluid">
	<section class="row shadow titulo mb-3">
		<article class="col-xs-11 col-sm-11 col-md-12 col-lg-11">
			<h1 class="text-center config">
				<i class="<?=$materia->icono?>"></i> <?=$materia->nombre_mat?> <?=$grado?>°
			</h1>
		</article>
	</section>
	<article class="row">
		<article class="col-md-5 mt-5">
			<ul class="list-group list-group-flush shadow">
				<li class="list-group-item">
					<article class="row">
						<article class="col-md-7">
							<span class="nombre_estudiante">
								<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
							</span>
						</article>
						<article class="col-md-3">
							<a href="<?=base_url?>Observador/vista_observador&id=<?=Utils::encryption($estudiante->id)?>&name=<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>&g=<?=Utils::encryption($grado)?>">
								<small class="badge rounded-pill bg-primary">
									Observaciones
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
							<span class="registro-fallas">
								<span class="badge rounded-pill bg-danger">
									<?=$fallas->total?>
								</span>
								registros de inasistencias
							</span>
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
								<div class="alert alert-danger text-center" role="alert">
									Este estudiante no tiene fallas>
								</div>
							<?php endif;?>
						</table>
					</article>
				</div>
			</div>
		</div>
		<!-- fin del acordeon -->
	</article>
</article>
<section class="row mt-5">
	<span class="text-center nombre_estudiante mb-3">Periodo 1</span>
	<section class="col-md-4">
			<div class="card text-white bg-success mb-3 text-center shadow">
				<div class="card-header titulo-criterio">Cognitivo <span class="badge bg-danger rounded-pill">
					<?php if (empty($cognitivo->porcentaje_cognitivo)): ?>
						0
					<?php else: ?>
						<?=$cognitivo->porcentaje_cognitivo?>
					<?php endif;?>
				%</span>
			</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Evaluaciones
						(<?php if (empty($cognitivo->porcentaje_evaluacion)): ?>
								0
							<?php else: ?>
								<?=$cognitivo->porcentaje_evaluacion?>
							<?php endif;?>
						%)
						<span class="badge bg-success rounded-pill">
							Nota: <strong><?php if (empty($evaluacionPeriodo1->nota_evaluacion)): ?>
							0
						<?php else: ?>
							<?=$evaluacionPeriodo1->nota_evaluacion?>
							<?php endif;?></strong>
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Trimestal
						(<?php if (empty($cognitivo->porcentaje_trimestral)): ?>
								0
							<?php else: ?>
								<?=$cognitivo->porcentaje_trimestral?>
								<?php endif;?>%)
						<span class="badge bg-success rounded-pill">
							Nota: <strong><?php if (empty($trimestralPeriodo1->nota_trimestral)): ?>
							0
						<?php else: ?>
							<?=$trimestralPeriodo1->nota_trimestral?>
							<?php endif;?></strong>
							</span>
							</li>
						</ul>
					</div>
					<div class="card-footer bg-transparent border-success">Footer</div>
				</div>
	</section>
	<section class="col-md-4">
			<div class="card text-white bg-warning mb-3 text-center shadow">
				<div class="card-header titulo-criterio">Procedimental <span class="badge bg-danger rounded-pill">
					<?php if (empty($procedimental->porcentaje_procedimental)): ?>
						0
					<?php else: ?>
						<?=$procedimental->porcentaje_procedimental?>
					<?php endif;?>
				%</span>
			</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Trabajo individual
						(<?php if (empty($procedimental->porcentaje_Tindividual)): ?>
								0
							<?php else: ?>
								<?=$procedimental->porcentaje_Tindividual?>
							<?php endif;?>
						%)
						<span class="badge bg-warning rounded-pill text-black">
							Nota: <strong><?php if (empty($trabajoIndividualPeriodo1->nota_Tindividual)): ?>
							0
						<?php else: ?>
							<?=$trabajoIndividualPeriodo1->nota_Tindividual?>
							<?php endif;?></strong>
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Trabajo colaborativo
						(<?php if (empty($procedimental->porcentaje_Tcolaborativo)): ?>
								0
							<?php else: ?>
								<?=$procedimental->porcentaje_Tcolaborativo?>
								<?php endif;?>%)
						<span class="badge bg-warning rounded-pill text-black">
							Nota: <strong><?php if (empty($trabajoColaborativoPeriodo1->nota_Tcolaborativo)): ?>
							0
						<?php else: ?>
							<?=$trabajoColaborativoPeriodo1->nota_Tcolaborativo?>
							<?php endif;?></strong>
							</span>
							</li>
						</ul>
					</div>
					<div class="card-footer bg-transparent border-success text-black">Nota del critero = <?=$definitiva_procedimentalUno?></div>
				</div>
	</section>
	<section class="col-md-4">
			<div class="card text-white bg-primary mb-3 text-center shadow">
				<div class="card-header titulo-criterio">Actitudinal <span class="badge bg-danger rounded-pill">
					<?php if (empty($actitudinal->porcentaje_actitudinal)): ?>
						0
					<?php else: ?>
						<?=$actitudinal->porcentaje_actitudinal?>
					<?php endif;?>
				%</span>
			</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Apreciativa
						(<?php if (empty($actitudinal->porcentaje_apreciativa)): ?>
								0
							<?php else: ?>
								<?=$actitudinal->porcentaje_apreciativa?>
							<?php endif;?>
						%)
						<span class="badge bg-primary rounded-pill">
							Nota: <strong><?php if (empty($apreciativaPeriodo1->nota_apreciativa)): ?>
							0
						<?php else: ?>
							<?=$apreciativaPeriodo1->nota_apreciativa?>
							<?php endif;?></strong>
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Autoevaluacion
						(<?php if (empty($actitudinal->porcentaje_autoevaluacion)): ?>
								0
							<?php else: ?>
								<?=$actitudinal->porcentaje_autoevaluacion?>
								<?php endif;?>%)
						<span class="badge bg-primary rounded-pill">
							Nota: <strong><?php if (empty($autoevaluacionPeriodo1->nota_autoevaluacion)): ?>
							0
						<?php else: ?>
							<?=$autoevaluacionPeriodo1->nota_autoevaluacion?>
							<?php endif;?></strong>
							</span>
							</li>
						</ul>
					</div>
					<div class="card-footer bg-transparent border-success">Footer</div>
				</div>
	</section>
</section>
<section class="row mt-5">
	<span class="text-center nombre_estudiante mb-3">Periodo 2</span>
	<section class="col-md-4">
		<div class="card border-success mb-3 text-center" >
			<div class="card-header bg-transparent border-success titulo-criterio">
				Actitudinal
				<span class="badge bg-danger rounded-pill">
					<?php if (empty($actitudinal->porcentaje_actitudinal)): ?>
						0
					<?php else: ?>
						<?=$actitudinal->porcentaje_actitudinal?>
					<?php endif;?>%
				</span>
			</div>
			<div class="card-body text-success">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Apreciativa
						(<?php if (empty($actitudinal->porcentaje_apreciativa)): ?>
								0
							<?php else: ?>
								<?=$actitudinal->porcentaje_apreciativa?>
							<?php endif;?>
						%)
						<span class="badge bg-primary rounded-pill">
							Nota: <strong><?=$apreciativaPeriodo1->nota_apreciativa?></strong>
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Autoevaluacion
						(<?php if (empty($actitudinal->porcentaje_autoevaluacion)): ?>
								0
							<?php else: ?>
								<?=$actitudinal->porcentaje_autoevaluacion?>
								<?php endif;?>%)
						<span class="badge bg-primary rounded-pill">
							Nota: <strong><?=$autoevaluacionPeriodo1->nota_autoevaluacion?></strong>
							</span>
							</li>
						</ul>
			</div>
			<div class="card-footer bg-transparent border-success">Footer</div>
		</div>
	</section>
	<section class="col-md-4"></section>
	<section class="col-md-4"></section>
</section>
<!--  fin del contenido -->
</section>
