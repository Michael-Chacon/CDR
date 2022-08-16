<section class="container-fluid">
	<section class="row titulo">
		<article class="col-md-12">
			<h1 class="text-center config">
				Tablero de actividades
			</h1>
		</article>
	</section>
	<section class="row">
		<?php if ($listado_actividades->rowCount() != 0): ?>
			<?php while ($actividad = $listado_actividades->fetchObject()): ?>
				<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mt-3">
					<div class="card shadow" style="border-left: 6px solid <?=$actividad->color?> !important;">
						<div class="card-body">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<h6 class="card-subtitle mb-1 "><?=ucfirst($actividad->titulo)?></h6>
								</div>
							</div>
							<p class="mt-0 haceTiempo"><?=Utils::difernciaParaHumanos($actividad->fechaRegistro)?></p>
							<!-- <a href="#" class="card-link">Ver</a> -->
							<div class="d-grid gap-2">
								<a class="btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#info_estudiante<?=$actividad->id?>"  aria-expanded="false" aria-controls="info">Detalles de la actividad
								</a>
							</div>
							<div class="collapse multi-collapse mt-3" id="info_estudiante<?=$actividad->id?>">
								<hr style="border: 1px solid <?=$actividad->color?>!important;">
								<span class="textoActividad"><?=$actividad->detalle?></span>
								<br>
									<h6 class="titulo-menu text-center">
										<small><?=Utils::fechaCarbon($actividad->fecha)?></small>
									</h6>
									<p class="subtexto text-center">Fecha actividad</p></p>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile;?>
		<?php else: ?>
			<div class="alert alert-danger text-center" role="alert">
				No hay actividades en el tablero de los estudiantes.
			</div>
		<?php endif;?>
	</section>
</section>
