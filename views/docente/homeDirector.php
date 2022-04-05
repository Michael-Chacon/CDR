<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<h1 class="text-center config">
				<?=$name_subject?> <?=$name_degree?>°
			</h1>
		</article>
		<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
			<acticle class="btn-group dropstart">
				<a class="" data-bs-toggle="dropdown" aria-expanded="false" type="button">
					<i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;">
					</i>
				</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" data-bs-target="#CreatGrado" data-bs-toggle="modal" href="#"><i class="bi bi-book-half"></i>  Crear materia</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" data-bs-target="#CreatHorario" data-bs-toggle="modal"  href="#"><i class="bi bi-calendar-week"></i>  Asignar horario</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#director"><i class="bi bi-check2-square"></i> Asignar director</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="<?=base_url?>/Grado/eliminarGrado&id_grado=<?=$actual->id?>" onclick="return confirmar()"><i class="bi bi-trash"></i>  Eliminar grado</a></li>
				</ul>
			</acticle>
		</article>
	</section>
	<section class="row">
		<article class="col-md-5">
			<div class="shadow">
				<table class="table">
					<tr>
						<th>Nombre</th>
						<th>Definitiva</th>
					</tr>
					<?php while ($estudiante = $listado_estudiantes->fetchObject()): ?>
						<tr>
							<td>
							<a href="<?=base_url?>Notas/homeNotas&student=<?=Utils::encryption($estudiante->id)?>&materia=<?=Utils::encryption($id_subject)?>&nGrado=<?=$name_degree?>&dir=ok">
								<?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
							</a>
							</td>
							<td>45</td>
						</tr>
					<?php endwhile;?>
				</table>
			</div>
		</article>
	</section>
</section>