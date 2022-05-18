<section class="container-fluid">
	<section class="row titulo">
		<article class="col-md-12">
			<h1 class="text-center config">
				<i class="bi bi-list-task"></i>
				Materias disponibles para matricular
			</h1>
		</article>
	</section>
	<section class="row justify-content-center jus mt-5">
		<article class="col-md-4">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="card-title text-center">Listado de materias</h5>
					<?php if ($listado_materias->rowCount() != 0): ?>
					<form action="<?=base_url?>Materias/guardarMatriculaDMateria" method="post">
						<input type="text" hidden name="estudiante" value="<?=$estudiante?>">
						<input type="text" hidden name="grado" value="<?=$grado?>">
						<input type="text" hidden name="padres" value="<?=$padres?>">
						<ul class="list-group mt-3">
							<?php while ($materia = $listado_materias->fetchObject()): ?>
								<li class="list-group-item">
									<input class="form-check-input me-1" type="checkbox" value="<?=$materia->id?>" name="materias[<?=$materia->id?>]"	 aria-label="...">
									<?=$materia->nombre_mat?>
								</li>
							<?php endwhile;?>
						</ul>
						<div class="d-grid gap-2">
							<button class="btn btn-success mt-3" type="submit">Guardar</button>
						</div>
					</form>
				<?php else: ?>
					<div class="alert alert-danger text-center" role="alert">
						No hay materias adicionales.
					</div>
				<?php endif;?>
				</div>
			</div>
		</article>
	</section>
</section>