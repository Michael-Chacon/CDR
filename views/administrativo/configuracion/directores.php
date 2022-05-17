<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Directores de grado asignados
			</h1>
		</article>
	</section>
	<?php echo Utils::getAlert(); ?>
	<?php Utils::borrar_error('alert'); ?>
	<section class="row mt-4 justify-content-around">
		<section class="col-xs-12 col-sm-12 col-md-10 col-lg-7">
			<?php if($listado_directores->rowCount() !=0): ?>
				<div class="shadow">
					<div class="table-responsive">
					<table class="table table-hover">
						<thead class="text-center">
							<tr>
								<th>Foto</th>
								<th>Docente</th>
								<th>Grado</th>
								<th>Desasignar</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php while($director = $listado_directores->fetchObject()):?>
								<tr>
									<td>
										<img src="<?=base_url?>photos/docentes/<?=$director->img?>" alt="docente" class="avatar-docente">
									</td>
									<td class="texto_tabla_docente">
										<?=$director->nombre_d?> <?=$director->apellidos_d?>
									</td>
									<td class="texto_tabla_docente">
										<?=$director->nombre_g?>
									</td>
									<td class="texto_tabla_docente">
										<a onclick="return confirm('¿Seguro que quiere eliminarlo?')" href="<?=base_url?>Configuracion/eliminarDirector&docente=<?=$director->id_docente?>">
											<i class="bi bi-trash efecto_hover"></i>
										</a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
					</div>
				</div>
			<?php else: ?>
				<div class="alert alert-danger" role="alert">
					No hay directores de grado asignados.
				</div>
			<?php endif; ?>
		</section>
	</section>
</section>
