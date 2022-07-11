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
	<section class="row justify-content-center mt-3">
		<article class="col-md-5">
			<a href="<?=base_url?>Pdf/listadoNotasEstudiantesXMateria&degree=<?=$id_degree?>&subject=<?=$id_subject?>&nombreg=<?=$name_degree?>&materia=<?=$name_subject?>" type="button" class="btn btn-success btn-sm">Listado de notas definitivas (PDF)</a>
		</article>
	</section>
	<section class="row justify-content-center mt-5">
		<article class="col-md-5">
			<div class="shadow">
				<table class="table">
					<tr>
						<th>#</th>
						<th>Foto</th>
						<th>Nombre</th>
					</tr>
					<?php
					$c = 1;
					while ($estudiante = $listado_estudiantes->fetchObject()): ?>
						<tr>
							<td class="texto_tabla_docente">
								<?php echo $c++; ?>
							</td>
							<td>
								<?php if ($estudiante->img == null): ?>
									<img alt="" class="avatar-tabla circulo" src="<?=base_url?>helpers/img/avatar.jpg"></img>
								<?php else: ?>
									<img alt="" class="avatar-tabla circulo" src="<?=base_url?>photos/estudiantes/<?=$estudiante->img?>"></img>
								<?php endif;?>
							</td>
							<td class="texto_tabla_docente">
							<a href="<?=base_url?>Notas/homeNotas&student=<?=Utils::encryption($estudiante->id)?>&materia=<?=Utils::encryption($id_subject)?>&nGrado=<?=$name_degree?>&dir=ok">
								<?=$estudiante->apellidos_e?> <?=$estudiante->nombre_e?>
							</a>
							</td>
						</tr>
					<?php endwhile;?>
				</table>
			</div>
		</article>
	</section>
</section>