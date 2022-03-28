<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-11col-sm-11 col-md-11 col-lg-11">
			<h1 class="text-center config">
				Areas  y banco de materias
			</h1>
		</article>
		<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
			<!-- Default dropstart button -->
			<articles class="btn-group dropstart">
				<a  class="" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-plus-lg efecto_hover" style="font-size: 2rem; color:white;"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#area">
							<i class="bi bi-back efecto_hover"></i> Crear área
						</a>
					</li>
					<li><hr class="dropdown-divider"></li>
					<li>
						<a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#materiasBase">
							<i class="bi bi-book efecto_hover"></i> Crear materia
						</a>
					</li>
				</ul>
			</articles>
		</article>
	</section>
	<?php echo Utils::general_alerts('guardar_area', 'Área creada con éxito', 'Algo salió mal al intentar registrar el área, inténtalo de nuevo.'); ?>
	<?php echo Utils::general_alerts('eliminar_area', 'El área fue eliminada con éxito', 'Algo salió mal al intentar eliminar el área, inténtelo de nuevo'); ?>
	<?php echo Utils::general_alerts('area_duplicada', '', 'El nombre de esta área ya está registrado en la base de datos, intenta con otro nombre.'); ?>
	<?php echo Utils::general_alerts('guardar_materia_base', 'La materia fue registrada con éxito.', 'Algo salió mal al registrar la materia, inténtelo de nuevo.') ?>
	<?php echo Utils::general_alerts('eliminar_base', 'La materia fue eliminada con éxito.', 'Algo salió mal al eliminar la materia, inténtelo de nuevo.') ?>

	<?php Utils::borrar_error('guardar_area');
	Utils::borrar_error('eliminar_area');
	Utils::borrar_error('area_duplicada');
	Utils::borrar_error('guardar_materia_base');
	Utils::borrar_error('eliminar_base');?>
	<!-- contenido de la pagina  -->
	<section class="row mt-4">
		<article class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-center">
			<span>Areas</span>
			<?php if ($areas->rowCount() != 0):
				$c = 1;?>
				<?php while ($area = $areas->fetchObject()): ?>
					<ul class="list-group mb-1 shadow">
						<li class="list-group-item fila-estudiante">
							<div class="row">
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nombre-apellidos-numero">
									<?=$c++?>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 nombre-apellidos-numero">
									<?=$area->nombre_area?>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 nombre-apellidos-numero">
									<span style="color:<?=$area->color?>">●</span>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 nombre-apellidos-numero">
									<a onclick="return (confirmar())" href="<?=base_url?>Configuracion/eliminar_area&id=<?=$area->id_area?>"  class="efecto_hover">
										<i class="bi bi-trash"></i>
									</a>
								</div>
							</div>
						</li>
					</ul>
				<?php endwhile;?>
			<?php else: ?>
				<span class="badge bg-warning text-dark ">No hay areas registradas</span>
			<?php endif;?>
		</article>
		<article class="col-xs-12 col-sm-12 col-md-5 col-lg-5 text-center ">
			<span class="text-center">Materias</span>
			<?php if ($listado_materias->rowCount() != 0):
				$c = 1;?>
				<?php while ($materia = $listado_materias->fetchObject()): ?>
					<ul class="list-group mb-1 shadow">
						<li class="list-group-item fila-estudiante">
							<div class="row">
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 nombre-apellidos-numero">
									<?=$c++?>
								</div>
								<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 nombre-apellidos-numero">
									<i class="<?=$materia->icono?>"></i> <?=$materia->nombre_materia?>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 nombre-apellidos-numero">
									<span style="color:<?=$materia->color?>">●</span>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 nombre-apellidos-numero">
									<a onclick="return (confirmar())" href="<?=base_url?>Configuracion/eliminar_materia_base&id=<?=$materia->id_base?>"  class="efecto_hover">
										<i class="bi bi-trash"></i>
									</a>
								</div>
							</div>
						</li>
					</ul>
				<?php endwhile;?>
			<?php else: ?>
				<span class="badge bg-warning text-dark ">No hay materias registradas</span>
			<?php endif;?>
		</article>
	</section>
	<!-- fin del contenido de la pagina -->
</section>
<!-- ============= modals ===========-->
<!-- Modal -->
<article class="modal fade" data-bs-backdrop="static" id="area" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<article class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear las áreas</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?=base_url?>Configuracion/guardar_area" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="area" class="form-label">Nombre del area:</label>
						<input type="text" class="form-control" id="area" placeholder="Area" name="area">
					</div>
					<div class="mb-3">
						<label for="color" class="form-label">Color:</label>
						<input type="color" class="form-control" id="color" placeholder="color" name="color">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</article>
</article>

<!-- modal para crear las materias -->
<section class="modal fade" id="materiasBase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<article class="modal-dialog  modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear las materias base</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?=base_url?>Configuracion/guardar_materia_base" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="materia" class="form-label">Nombre de la materia:</label>
						<input type="text" name="materia" class="form-control" id="materia" placeholder="Nombre materia" required>
					</div>
					<hr>
					<div class="mb-3">
						<label for="icono" class="form-label">Icono de la materia:</label>
						<input type="text" name="icono" class="form-control" id="icono" placeholder="Icono">
						<div id="emailHelp" class="form-text"><a href="" data-bs-target="#segundo" data-bs-toggle="modal" data-bs-dismiss="modal">Listado de iconos</a></div>
					</div>
					<hr>
					<div class="mb-3">
						<label for="area" class="form-label">Área a la que pertenece la materia:</label>
						<select class="form-select" aria-label="Default select example" id="area" name="area" required>
							<option></option>
							<?php while($area_base = $areas_materia->fetchObject()): ?>
							<option value="<?=$area_base->id_area?>"><?=$area_base->nombre_area?></option>
						<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Registrar</button>
				</div>
			</form>
		</div>
	</article>
</section>

<!-- doble -->
<article class="modal fade" id="segundo" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <article class="modal-dialog modal-fullscreen modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">listado de iconos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"  data-bs-dismiss="modal">Listo</button>
      </div>
    </div>
  </article>
</article>
