<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-11col-sm-11 col-md-11 col-lg-11">
			<h1 class="text-center config">
				Aulas
			</h1>
		</article>
		<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
			<a href="" data-bs-toggle="modal" data-bs-target="#area">
				<i class="bi bi-plus-lg efecto_hover " style="font-size: 2rem; color:white;"></i>
			</a>
		</article>
	</section>
	<?php echo Utils::getAlert(); ?>
	<?php Utils::borrar_error('alert');?>

	<section class="row justify-content-center mt-5">
		<article class="col-md-8">
			<ul class="list-group mb-1 text-center">
				<li class="list-group-item fila-estudiante">
					<div class="row">
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nombre-apellidos-numero">
							#
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 nombre-apellidos-numero">
							Aula
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nombre-apellidos-numero">
							Asignada?
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nombre-apellidos-numero">
							<i class="bi bi-trash"></i>
						</div>
					</div>
				</li>
			</ul>
			<?php if($todas_aulas->rowCount() != 0):
				$contador = 1;?>
				<?php while($aulas = $todas_aulas->fetchObject()): ?>
					<ul class="list-group mb-1 text-center">
						<li class="list-group-item fila-estudiante">
							<div class="row">
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nombre-apellidos-numero">
									<?=$contador++?>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 nombre-apellidos-numero">
									<?=$aulas->nombre?>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 estado_aula">
									<?php if($aulas->asignada == 'no'): ?>
										<span class="badge bg-danger">
									<?php else: ?>
										<span class="badge bg-success">
									<?php endif; ?>
											<?=strtoupper($aulas->asignada)?>
										</span>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nombre-apellidos-numero">
									<a onclick="return (confirmar())" href="<?=base_url?>Configuracion/eliminar_aula&id=<?=$aulas->id_aula?>"  class="efecto_hover">
										<i class="bi bi-trash"></i>
									</a>
								</div>
							</div>
						</li>
					</ul>
				<?php endwhile; ?>
			<?php else: ?>
				<div class="alert alert-danger text-center" role="alert">
					No hay aulas registradas
				</div>
			<?php endif; ?>
		</article>
	</section>
</section>
<!-- ============= modals ===========-->
<!-- Modal -->
<article class="modal fade" data-bs-backdrop="static" id="area" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<article class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title " id="exampleModalLabel">Crear aula</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?=base_url?>Configuracion/guardar_aula" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="area" class="form-label">Nombre del aula:</label>
						<input type="text" class="form-control" id="area" placeholder="Aula" name="aula">
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
