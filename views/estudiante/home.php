<section class="container-fluid">
	<section class="row">
		<h3 class="text-center mb-2 mt-3  mb-5 titulo-perfil"> <span class="tituloss">Materias</span></h3>
		<?php if ($materias->rowCount() != 0): ?>
			<?php while ($materia = $materias->fetchObject()): ?>
				<article class="col-xs-12 col-sm-6 col-md-3 col-xl-3 mb-2">
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
		<h3 class="text-center mb-2 mt-5  mb-3 titulo-perfil">
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
