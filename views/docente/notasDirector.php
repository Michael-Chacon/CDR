<section class="container-fluid">
	<section class="row shadow titulo mb-3">
		<article class="col-xs-11 col-sm-11 col-md-12 col-lg-11">
			<h1 class="text-center config">
				<i class="<?=$materia->icono?>"></i> <?=$materia->nombre_mat?> <?=$grado?>°
			</h1>
		</article>
	</section>
</section>

<section class="container-fluid">
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
							<a href="<?=base_url?>Observador/vista_observador&id=<?=$estudiante->id?>&name=<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>&g=<?=$grado?>">
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
								<p class="text-center mt-3"><span class="badge bg-warning text-dark">Este estudiante no tiene fallas.</span></p>
							<?php endif;?>
						</table>
					</article>
				</div>
			</div>
		</div>
		<!-- fin del acordeon -->
	</article>
</article>
</section>
