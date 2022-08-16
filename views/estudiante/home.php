 <section class="container-fluid">
	<main class="row">
		<section class="col-md-9">
			<section class="row">
				<h3 class="text-center mb-2 mt-3  mb-3 titulo-perfil"> <span class="tituloss">Materias</span></h3>
				<?php if ($materias->rowCount() != 0): ?>
					<?php while ($materia = $materias->fetchObject()): ?>
						<article class="col-xs-12 col-sm-6 col-md-4 col-xl-4 mb-2">
							<div class="card text-center shadow option">
								<div class="card-body contenido-card ">
									<i class="<?=$materia->icono?>" style="font-size: 1.5rem;">
									</i>
									<hr class="hr-perfil"/>
									<h6 class="mt-2">
										<?=$materia->nombre_mat?>
									</h6>
									<a class="stretched-link" href="<?=base_url?>Notas/homeNotas&materia=<?=Utils::encryption($materia->id)?>&student=<?=Utils::encryption($_SESSION['student']['id_estudiante'])?>">
									</a>
								</div>
							</div>
						</article>
					<?php endwhile;?>
				<?php else: ?>
					<div class="alert alert-danger text-center" role="alert">
						No hay materias.
					</div>
				<?php endif;?>
			</section>
			<!-- INICIO DEL HORARIO DE CLASE-->
			<section class="row">
				<h3 class="text-center  mb-3 titulo-perfil">
					<span class="tituloss">Horario de clase</span>
				</h3>
				<article class="col-md-4 text-center">
					<span class="dia">
						Lunes
					</span>
					<hr/>
					<?php if ($lista_lunes->rowCount() != 0): ?>
						<div>
							<table class="table shadow text-center table-bordered table-hover">
								<thead>
									<tr>
										<th scope="col">
											Inicio
										</th>
										<th scope="col">
											Fin
										</th>
										<th scope="col">
											Materia
										</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($lunes = $lista_lunes->fetchObject()): ?>
										<tr>
											<td>
												<?=$lunes->inicio?>
											</td>
											<td>
												<?=$lunes->fin?>
											</td>
											<td>
												<?=$lunes->nombre_mat?>
											</td>
										</tr>
									<?php endwhile;?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<div class="alert alert-danger text-center" role="alert">
							No hay horario asignado.
						</div>
					<?php endif;?>
					<hr/>
				</article>
				<article class="col-md-4 text-center">
					<span class="dia">
						Martes
					</span>
					<hr/>
					<?php if ($lista_martes->rowCount() != 0): ?>
						<div>
							<table class="table shadow text-center table-bordered table-hover">
								<thead>
									<tr>
										<th scope="col">
											Inicio
										</th>
										<th scope="col">
											Fin
										</th>
										<th scope="col">
											Materia
										</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($martes = $lista_martes->fetchObject()): ?>
										<tr>
											<td>
												<?=$martes->inicio?>
											</td>
											<td>
												<?=$martes->fin?>
											</td>
											<td>
												<?=$martes->nombre_mat?>
											</td>
										</tr>
									<?php endwhile;?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<div class="alert alert-danger text-center" role="alert">
							No hay horario asignado.
						</div>
					<?php endif;?>
					<hr/>
				</article>
				<article class="col-md-4 text-center">
					<span class="dia">
						Miércoles
					</span>
					<hr/>
					<?php if ($lista_miercoles->rowCount() != 0): ?>
						<div>
							<table class="table shadow text-center table-bordered table-hover">
								<thead>
									<tr>
										<th scope="col">
											Inicio
										</th>
										<th scope="col">
											Fin
										</th>
										<th scope="col">
											Materia
										</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($miercoles = $lista_miercoles->fetchObject()): ?>
										<tr>
											<td>
												<?=$miercoles->inicio?>
											</td>
											<td>
												<?=$miercoles->fin?>
											</td>
											<td>
												<?=$miercoles->nombre_mat?>
											</td>
										</tr>
									<?php endwhile;?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<div class="alert alert-danger text-center" role="alert">
							No hay horario asignado.
						</div>
					<?php endif;?>
					<hr/>
				</article>
				<article class="col-md-4 text-center">
					<span class="dia">
						Jueves
					</span>
					<hr/>
					<?php if ($lista_jueves->rowCount() != 0): ?>
						<div>
							<table class="table shadow text-center table-bordered table-hover ">
								<thead>
									<tr>
										<th scope="col">
											Inicio
										</th>
										<th scope="col">
											Fin
										</th>
										<th scope="col">
											Materia
										</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($jueves = $lista_jueves->fetchObject()): ?>
										<tr>
											<td>
												<?=$jueves->inicio?>
											</td>
											<td>
												<?=$jueves->fin?>
											</td>
											<td>
												<?=$jueves->nombre_mat?>
											</td>
										</tr>
									<?php endwhile;?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<div class="alert alert-danger text-center" role="alert">
							No hay horario asignado.
						</div>
					<?php endif;?>
					<hr/>
				</article>
				<article class="col-md-4 text-center">
					<span class="dia">
						Viernes
					</span>
					<hr/>
					<?php if ($lista_viernes->rowCount() != 0): ?>
						<div>
							<table class="table shadow text-center table-bordered table-hover ">
								<thead>
									<tr>
										<th scope="col">
											Inicio
										</th>
										<th scope="col">
											Fin
										</th>
										<th scope="col">
											Materia
										</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($viernes = $lista_viernes->fetchObject()): ?>
										<tr>
											<td>
												<?=$viernes->inicio?>
											</td>
											<td>
												<?=$viernes->fin?>
											</td>
											<td>
												<?=$viernes->nombre_mat?>
											</td>
										</tr>
									<?php endwhile;?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<div class="alert alert-danger text-center" role="alert">
							No hay horario asignado.
						</div>
					<?php endif;?>
					<hr/>
				</article>
			</section>
		</section>
		<!-- tablero de actividades -->
		<section class="col-md-3 mt-4">
			<span class="valor_item">Tablero de actividades</span>
			<?php if ($actividades_estudiantes->rowCount() != 0): ?>
					<?php while ($actividad = $actividades_estudiantes->fetchObject()): ?>
							<div class="card shadow mt-3 mb-3" style="border-left: 6px solid <?=$actividad->color?> !important;">
								<div class="card-body">
									<h6 class="card-subtitle mb-1 "><?=ucfirst($actividad->titulo)?></h6>
									<p class="card-text "><?=Utils::fechaCarbon($actividad->fecha)?></p>
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
					<?php endwhile;?>
					<div class="d-grid gap-2">
						<a  href="<?=base_url?>Tablero/verActividades&user=<?=Utils::encryption("estudiante")?>" type="button" class="btn btn-outline-primary position-relative">
							Ver todas las actividades<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?=$total_actividades->countActivityes?> <span class="visually-hidden">unread messages</span></span>
						</a>
					</div>
				<?php else: ?>
					<div class="card shadow mt-3">
						<div class="card-body">
							No hay actividades en el tablero de los estudiantes.
						</div>
					</div>
				<?php endif;?>
		</section>
	</main>
</section>
