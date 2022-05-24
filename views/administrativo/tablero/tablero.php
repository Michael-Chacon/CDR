<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<h1 class="text-center config">
				Tablero de actividades
			</h1>
		</article>
		<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
			<a data-bs-target="#escribir_tablero" data-bs-toggle="modal"  type="button">
				<i class="bi bi-plus-lg efecto_hover" style="font-size: 2rem; color: white;">
				</i>
			</a>
		</article>
	</section>
	<?php Utils::getAlert();?>
	<?php Utils::borrar_error('alert');?>
	<hr>
	<section class="row">
		<section class="col-md-6">
			<section class="row">
			<span class="valor_item text-center">Tablero de los estudiantes</span>
				<?php if ($actividades_estudiantes->rowCount() != 0): ?>
					<?php while ($actividad = $actividades_estudiantes->fetchObject()): ?>
						<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3">
							<div class="card shadow" style="border-left: 6px solid <?=$actividad->color?> !important;">
								<div class="card-body">
									<div class="row">
										<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
											<h6 class="card-subtitle mb-1 "><?=ucfirst($actividad->titulo)?></h6>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											<a onclick="return confirmar()" href="<?=base_url?>Tablero/eliminarTablero&id=<?=$actividad->id?>&usuario=estudiante"><i class="bi bi-trash efecto_hover"></i></a>
										</div>
									</div>
									<p class="card-text "><?=$actividad->fecha?></p>
									<!-- <a href="#" class="card-link">Ver</a> -->
									<div class="d-grid gap-2">
									<a class="btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#info_estudiante<?=$actividad->id?>"  aria-expanded="false" aria-controls="info">Detalles de la actividad
									</a>
								</div>
									<div class="collapse multi-collapse mt-3" id="info_estudiante<?=$actividad->id?>">
										<hr style="border: 1px solid <?=$actividad->color?>!important;">
										<span><?=$actividad->detalle?></span>
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
		<section class="col-md-6" style="border-left: 1px dotted #000;">
			<section class="row">
				<span class="valor_item text-center">Tablero de los docentes</span>
				<?php if ($actividades_docentes->rowCount() != 0): ?>
					<?php while ($actividad_d = $actividades_docentes->fetchObject()): ?>
						<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-2 mb-3">
							<div class="card " style="border-right: 6px solid <?=$actividad_d->color?> !important;">
								<div class="card-body">
									<div class="row">
										<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
											<h6 class="card-subtitle mb-1 "><?=ucfirst($actividad_d->titulo)?></h6>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											<a onclick="return confirmar()" href="<?=base_url?>Tablero/eliminarTablero&id=<?=$actividad_d->id?>&usuario=docente"><i class="bi bi-trash efecto_hover"></i></a>
										</div>
									</div>
									<p class="card-text "><?=$actividad_d->fecha?></p>
									<!-- <a href="#" class="card-link">Ver</a> -->
									<div class="d-grid gap-2">
									<a class="btn btn-outline-success btn-sm" data-bs-toggle="collapse" href="#info_docente<?=$actividad_d->id?>"  aria-expanded="false" aria-controls="info">Detalles de la actividad
									</a>
									</div>
									<div class="collapse multi-collapse mt-3" id="info_docente<?=$actividad_d->id?>">
										<hr style="border: 1px solid <?=$actividad_d->color?> !important;">
										<span><?=$actividad_d->detalle?></span>
									</div>
								</div>
							</div>
						</article>
					<?php endwhile;?>
				<?php else: ?>
					<div class="alert alert-danger text-center" role="alert">
						No hay actividades en el tablero de los docentes.
					</div>
				<?php endif;?>
			</section>
		</section>
	</section>
</section>
<!-- Modal -->
<section class="modal fade" id="escribir_tablero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     	<div class="">
				<form action="<?=base_url?>Tablero/guardarActividad" method="post">
					<article class="row">
						<article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<article class="form-floating mb-3">
								<input type="text" class="form-control" id="titulo" placeholder="Título" name="titulo">
								<label for="titulo">Título de la actividad:</label>
							</article>
						</article>
						<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<article class="form-floating mb-3">
								<input type="date" class="form-control" id="fecha" placeholder="name@example.com" name="fecha">
								<label for="fecha">Fecha:</label>
							</article>
						</article>
					</article>
					<article class="row">
						<article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
							<article class="form-floating">
								<textarea class="form-control" placeholder="Descripción de la actividad:" id="descripcion" style="height: 70px" name="detalle"></textarea>
								<label for="descripcion">Detalles de la actividad:</label>
							</article>
						</article>
						<article class="col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-3 mb-3">
							<article class="form-floating ">
								<input type="color" class="form-control" id="color"  name="color">
								<label for="color">Color:</label>
							</article>
						</article>
					<h6 class="text-center"> Elige el destinatario</h6>
					</article>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="destinatario" id="inlineRadio1" value="estudiante">
						<label class="form-check-label" for="inlineRadio1">Estudiantes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="destinatario" id="inlineRadio2" value="docente">
						<label class="form-check-label" for="inlineRadio2">Docentes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="destinatario" id="inlineRadio3" value="estudianteDocente">
						<label class="form-check-label" for="inlineRadio3">Estudiantes y docentes</label>
					</div>
					<div class="d-grid gap-2 mt-3">
						<button class="btn btn-primary btn-sm" type="submit">Guardar actividad</button>
					</div>
				</form>
			</div>
      </div>
    </div>
  </div>
</section>
