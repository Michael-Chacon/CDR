<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-11col-sm-11 col-md-11 col-lg-11">
			<h1 class="text-center config">
				Areas academicas
			</h1>
		</article>
		<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
			<a href="" data-bs-toggle="modal" data-bs-target="#area">
				<i class="bi bi-plus-lg efecto_hover " style="font-size: 2rem; color:white;"></i>
			</a>
		</article>
	</section>
	<?php echo Utils::general_alerts('guardar_area', 'Área creada con éxito', 'Algo salió mal al intentar registrar el área, inténtalo de nuevo.'); ?>
	<?php echo Utils::general_alerts('eliminar_area', 'El área fue eliminada con éxito', 'Algo salió mal al intentar eliminar el área, inténtelo de nuevo'); ?>
	<?php echo Utils::general_alerts('area_duplicada', '', 'El nombre de esta área ya está registrado en la base de datos, intenta con otro nombre.'); ?>

	<?php Utils::borrar_error('guardar_area');
			Utils::borrar_error('eliminar_area');
			Utils::borrar_error('area_duplicada');?>
	<!-- contenido de la pagina  -->
	<section class="row justify-content-center mt-4">
		<article class="col-md-6 text-center">
			<?php if ($areas->rowCount() != 0):
				$c = 1;?>
				<?php while ($area = $areas->fetchObject()): ?>
					<ul class="list-group mb-1 ">
						<li class="list-group-item fila-estudiante">
							<div class="row">
								<div class="col-md-2 nombre-apellidos-numero">
									<?=$c++?>
								</div>
								<div class="col-md-8 nombre-apellidos-numero">
									<?=$area->nombre_area?>
								</div>
								<div class="col-md-2 nombre-apellidos-numero">
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
	</section>
	<!-- fin del contenido de la pagina -->
</section>
<!-- ============= modals ===========-->
<!-- Modal -->
<article class="modal fade" data-bs-backdrop="static" id="area" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<article class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear area</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?=base_url?>Configuracion/guardar_area" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="area" class="form-label">Nombre del area:</label>
						<input type="text" class="form-control" id="area" placeholder="Area" name="area">
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
