<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Configuración de los criterios de calificación
			</h1>
		</article>
	</section>
	<?php echo Utils::getAlert(); ?>
	<?php Utils::borrar_error('alert');?>
	<section class="row  justify-content-center mt-5">
		<article class="col-md-4">
			<div class="card text-white bg-success mb-3 text-center shadow">
				<div class="card-header titulo-criterio">Cognitivo <span class="badge bg-danger rounded-pill">
					<?php if (empty($cognitivas->porcentaje_cognitivo)): ?>
						0
					<?php else: ?>
						<?=$cognitivas->porcentaje_cognitivo?>
					<?php endif;?>
				%</span>
			</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Evaluaciones
						<span class="badge bg-success rounded-pill">
							<?php if (empty($cognitivas->porcentaje_evaluacion)): ?>
								0
							<?php else: ?>
								<?=$cognitivas->porcentaje_evaluacion?>
							<?php endif;?>
						%</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Trimestal
						<span class="badge bg-success rounded-pill">
							<?php if (empty($cognitivas->porcentaje_trimestral)): ?>
								0
							<?php else: ?>
								<?=$cognitivas->porcentaje_trimestral?>
								<?php endif;?>%</span>
							</li>
						</ul>
						<div class="d-grid gap-2 mt-2">
							<a  href="#" class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#cognitivo">Editar</a>
						</div>
					</div>
				</div>
			</article>
			<article class="col-md-4">
				<div class="card  bg-warning mb-3 text-center shadow">
					<div class="card-header titulo-criterio">Procedimental <span class="badge bg-danger rounded-pill">
						<?php if (empty($procedimentales->porcentaje_procedimental)): ?>
							0
						<?php else: ?>
							<?=$procedimentales->porcentaje_procedimental?>
						<?php endif;?>
					%</span></div>
					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Tabajo individual
								<span class="badge bg-warning rounded-pill text-black">
									<?php if (empty($procedimentales->porcentaje_Tindividual)): ?>
										0
									<?php else: ?>
										<?=$procedimentales->porcentaje_Tindividual?>
									<?php endif;?>
								%</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Trabajo colaborativo
								<span class="badge bg-warning rounded-pill text-black">
									<?php if (empty($procedimentales->porcentaje_Tcolaborativo)): ?>
										0
									<?php else: ?>
										<?=$procedimentales->porcentaje_Tcolaborativo?>
									<?php endif;?>
								%</span>
							</li>
						</ul>
						<div class="d-grid gap-2 mt-2">
							<a  href="#" class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#procedimental">Editar</a>
						</div>
					</div>
				</div>
			</article>
			<article class="col-md-4">
				<div class="card text-white bg-primary mb-3 text-center shadow" >
					<div class="card-header titulo-criterio">Actitudinal <span class="badge bg-danger rounded-pill">
						<?php if (empty($actitudinales->porcentaje_actitudinal)): ?>
							0
						<?php else: ?>
							<?=$actitudinales->porcentaje_actitudinal?>
						<?php endif;?>
					%</span></div>
					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Apreciativa
								<span class="badge bg-primary rounded-pill">
									<?php if (empty($actitudinales->porcentaje_apreciativa)): ?>
										0
									<?php else: ?>
										<?=$actitudinales->porcentaje_apreciativa?>
									<?php endif;?>
								%</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Autoevaluación
								<span class="badge bg-primary rounded-pill">
									<?php if (empty($actitudinales->porcentaje_autoevaluacion)): ?>
										0
									<?php else: ?>
										<?=$actitudinales->porcentaje_autoevaluacion?>
									<?php endif;?>
								%</span>
							</li>
						</ul>
						<div class="d-grid gap-2 mt-2">
							<a  href="#" class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#actitudinal">Editar</a>
						</div>
					</div>
				</div>
			</article>
		</section>
		<!-- fin del container -->
	</section>
	<!-- ---------------------------------------- -->
	<!-- Modal cognitivo-->
	<section class="modal fade" id="cognitivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<article class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Porcentaje criterio cognitivo</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?=base_url?>Configuracion/actualizarCognitivo" method="post">
					<div class="modal-body">
						<div class="mb-3">
							<label for="cognitivo" class="form-label">Porcentaje cognitivo:</label>
							<input type="number" class="form-control" id="cognitivo" placeholder="Porcentaje" name="cognitivo" value="<?=$cognitivo?>" min="00" max="100" step="1">
						</div>
						<div class="mb-3">
							<label for="evaluacion" class="form-label">Porcentaje evaluacion:</label>
							<input type="number" class="form-control" id="evaluacion" placeholder="Porcentaje" name="evaluacion" value="<?=$evaluacion?>" min="00" max="100" step="1">
						</div>
						<div class="mb-3">
							<label for="trimestral" class="form-label">Porcentajet trimestral:</label>
							<input type="number" class="form-control" id="trimestral" placeholder="Porcentaje" name="trimestral" value="<?=$trimestral?>" min="00" max="100" step="1">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success">Actualizar</button>
					</div>
				</form>
			</div>
		</article>
	</section>

	<!-- Modal procedimental-->
	<section class="modal fade" id="procedimental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<article class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Porcentaje criterio procedimental</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?=base_url?>Configuracion/actualizarProcedimental" method="post">
					<div class="modal-body">
						<div class="mb-3">
							<label for="procedimental" class="form-label">Porcentaje procedimental:</label>
							<input type="number" class="form-control" id="procedimental" placeholder="Porcentaje" name="procedimental" value="<?=$procedimental?>" min="00" max="100" step="1">
						</div>
						<div class="mb-3">
							<label for="individual" class="form-label">Porcentaje trabajo individual:</label>
							<input type="number" class="form-control" id="individual" placeholder="Porcentaje" name="individual" value="<?=$individual?>"min="00" max="100" step="1">
						</div>
						<div class="mb-3">
							<label for="colaborativo" class="form-label">Porcentajet trabajo colaborativo:</label>
							<input type="number" class="form-control" id="colaborativo" placeholder="Porcentaje" name="colaborativo" value="<?=$colaborativo?>" min="00" max="100" step="1">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-warning">Actualizar</button>
					</div>
				</form>
			</div>
		</article>
	</section>

	<!-- Modal actitudinal-->
	<section class="modal fade" id="actitudinal" tabindex="-1" aria-labelledby="criterioA" aria-hidden="true">
		<article class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="criterioA">Porcentaje criterio actitudinal</h5>
					<button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?=base_url?>Configuracion/actualizarActitudinal" method="post">
					<div class="modal-body">
						<div class="mb-3">
							<label for="actitudinal" class="form-label">Porcentaje actitudinal:</label>
							<input type="number" class="form-control" id="actitudinal" placeholder="Porcentaje" name="actitudinal" value="<?=$actitudinal?>" min="00" max="100" step="1">
						</div>
						<div class="mb-3">
							<label for="apreciativa" class="form-label">Porcentaje apreciativa:</label>
							<input type="number" class="form-control" id="apreciativa" placeholder="Porcentaje" name="apreciativa" value="<?=$apreciativa?>" min="00" max="100" step="1">
						</div>
						<div class="mb-3">
							<label for="autoevaluacion" class="form-label">Porcentajet Autoevaluación:</label>
							<input type="number" class="form-control" id="autoevaluacion" placeholder="Porcentaje" name="autoevaluacion" value="<?=$autoevaluacion?>" min="00" max="100" step="1">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</article>
	</section>