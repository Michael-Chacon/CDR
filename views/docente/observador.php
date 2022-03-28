	<section class="container-fluid">
		<section class="row shadow titulo">
			<article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
				<h1 class="text-center config">
					Observador del estudiante
				</h1>
			</article>
			<?php if (isset($_SESSION['teacher']) | isset($_SESSION['user'])): ?>
			<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
				<acticle class="btn-group dropstart">
					<a aria-expanded="false" class="" data-bs-toggle="dropdown" type="button">
						<i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;">
						</i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#observador" href="#">
								<i class="bi bi-eye"></i>
								Nueva observacion
							</a>
						</li>
					</ul>
				</acticle>
			</article>
		<?php else: ?>
		<?php endif;?>
	</section>
	<?php echo Utils::general_alerts('guardar_observacion', 'Observación registrada con éxito.', 'Algo salió mal al intentar registrar la observación, inténtelo de nuevo.') ?>
	<?php Utils::borrar_error('guardar_observacion')?>
	<section class="row justify-content-center mt-5">
		<article class="col-md-8">
			<?php  if($listado_observaciones->rowCount() != 0): ?>
				<?php while($observador = $listado_observaciones->fetchObject()): ?>
			<div class="card text-white bg-dark mb-5 shadow">
				<div class="card-header text-center">
					<article class="row">
						<article class="col-md-2 borde-items">
							<p class="items">Grado:</p>
							<span class="datos-items"><?=$observador->grado?></span>
						</article>
						<article class="col-md-4 borde-items">
							<p class="items">Observación registrada por:</p>
							<span class="datos-items"><?=$observador->docente?></span>
						</article>
						<article class="col-md-4 borde-items">
							<p class="items">Alumno:</p>
							<span class="datos-items"><?=$observador->estudiante?></span>
						</article>
						<article class="col-md-2 borde-items">
							<p class="items">Fecha:</p>
							<span class="datos-items"><?=$observador->fecha_ob?></span>
						</article>
					</article>
				</div>
				<article class="card-body ">
					<h5 class="card-title datos-items">Observación:</h5>
					<p class="card-text"><?=$observador->observacion?></p>
					<hr/>
					<h5 class="card-title datos-items">Acciones y compromisos:</h5>
					<p class="card-text"><?=$observador->acciones?></p>
					<hr/>
					<article class="d-grid gap-2">
						<button class="btn btn-outline-primary" type="button">Descargar</button>
					</article>
				</article>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		</article>
	</section>
</section>
<!-- modal para hacer las onservaciones -->
<!-- Modal -->
<section class="modal fade" id="observador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nueva observación al estudiante</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?=base_url?>Observador/guardar_observacion" method="post">
				<div class="modal-body">
					<input type="number" hidden name="id_estudiante" value="<?=$_GET['id']?>">
					<input type="text" hidden name="grado" value="<?=$_GET['g']?>">
					<input type="text" hidden name="estudiante" value="<?=$_GET['name']?>">
					<section class="row">
						<div class="col-md-5">
							<div class="mb-3">
								<label for="fecha" class="form-label">Fecha:</label>
								<input type="date" class="form-control" id="fecha" placeholder="Fecha" name="fecha">
							</div>
						</div>
						<div class="col-md-7">
							<div class="mb-3">
								<label for="docente" class="form-label">Observación registrada por:</label>
								<input type="text" class="form-control" id="docente" placeholder="Nombre del docente" name="docente">
							</div>
						</div>
					</section>
					<section class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="observacion" class="form-label">Observación:</label>
								<textarea class="form-control" id="observacion" rows="2" name="observacion"></textarea>
							</div>
						</div>
					</section>
					<section class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="accionesCompromisos" class="form-label">Acciones y compromisos:</label>
								<textarea class="form-control" id="accionesCompromisos" rows="3" name="acciones_compromisos"></textarea>
							</div>
						</div>
					</section>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</section>