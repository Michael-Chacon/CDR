<section class="container-fluid">
<section class="row titulo">
	<article class="col-md-12">
		<h1 class="text-center config">
			<i class="bi <?=$materia->icono?>"></i>
			<?=$materia->nombre_mat?> <?=$grado?>
		</h1>
	</article>
</section>
<!--  -->
<section class="row mt-3">
	<section class="col-md-4">
		<section class="perfil-notas">
			<div class="card shadow ">
				<div class="card-body">
					<div class="row">
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<article class="flex-shrink-0 text-center mb-1">
									<?php if (empty($docente->img)): ?>
										<img alt="" class="avatar-perfil-d" src="<?=base_url?>helpers/img/avatar.jpg"></img>
									<?php else: ?>
										<img alt="" class="avatar-perfil-d" src="<?=base_url?>photos/docentes/<?=$docente->img?>"></img>
									<?php endif;?>
							</article>
						</article>
					</div>
					<h5 class="card-subtitle  text-center"><?php if(!empty($docente->nombre_d) && !empty($docente->apellidos_d)): ?>
						<?=$docente->nombre_d?> <?=$docente->apellidos_d?>
					<?php else: ?>
						No hay docente
					<?php endif; ?>
					</h5>
					<p class="text-center subtitulo">Docente</p>
					<p class="text-center"><strong class="correo_d">Correos del docente:</strong> <?php if(!empty($docente->correo_d)):?>
					<?=$docente->correo_d?></p>
				<?php else: ?>
					sin correo
				<?php endif; ?>
					<hr>
					<p class="card-text indicador"><strong>Indicadores de la materia:</strong> <?=$materia->indicadores_mat?></p>
					<p class="indicador"><strong>Área:</strong>
						<?php if(!empty($docente->nombre_area)):?>
							<?=ucfirst(strtolower($docente->nombre_area))?>
						<?php else: ?>
							No hay docente
						<?php endif; ?>
					</p>
					<button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#listadoFallas">
						Fallas <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?=$fallas->total?><span class="visually-hidden">unread messages</span></span>
					</button>
					<!-- <a href="#" class="card-link">Another link</a> -->
				</div>
			</div>
		</section>
	</section>
	<section class="col-md-8 mb-5">
		<div class="perfil-notas shadow  mt-2  rounded ">
			<ul class="nav nav-pills mb-3 titulos-pills " id="pills-tab" role="tablist">
				<li class="nav-item opciones" role="presentation">
					<button aria-controls="pills-home" aria-selected="true" class="nav-link active boton-opciones" data-bs-target="#notas" data-bs-toggle="pill" id="notas-tab" role="tab" type="button">
						Notas
					</button>
				</li>
				<li class="nav-item opciones" role="presentation">
					<button aria-controls="pills-profile" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#actividades" data-bs-toggle="pill" id="actividades-tab" role="tab" type="button">
						Actividades
					</button>
				</li>
				<li class="nav-item opciones" role="presentation">
					<button aria-controls="pills-contact" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#documentos" data-bs-toggle="pill" id="documentos-tab" role="tab" type="button">
						Docuemtos de clase
					</button>
				</li>
			</ul>
			<!--  contenido del pills-->
			<section class="tab-content" id="pills-tabContent">
				<section aria-labelledby="notas-tab" class="tab-pane fade show active" id="notas" role="tabpanel">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Vitae alias cupiditate laborum placeat velit mollitia et esse ullam corporis veritatis!</p>
				</section>
				 <section aria-labelledby="actividades-tab" class="tab-pane fade" id="actividades" role="tabpanel">
				 	<section class="row mt-3 p-2">
				 	<?php if($listado_actividades->rowCount() != 0): ?>
				 		<?php while($actividad = $listado_actividades->fetchObject()): ?>
				 			<div class="col-md-4 mb-3">
				 				<div class="card text-center shadow-sm">
				 					<div class="card-body">
				 						<h5 class="card-title "><?=$actividad->titulo_actividad?> <span class="punto-bien"> ●</span> </h5>
				 						<h6 class="card-subtitle mb-2 text-muted"><?=$actividad->fecha?></h6>
				 						<p class="card-text tituloActividad "><?=$actividad->descripcion?></p>
				 					</div>
				 				</div>
				 			</div>
				 		<?php endwhile; ?>
				 	<?php else: ?>
				 		<div class="alert alert-danger text-center" role="alert">
				 			El docente no ha registrado actividades en esta materia.
				 		</div>
				 	<?php endif; ?>
				 	</section>
				 </section>
				  <section aria-labelledby="documentos-tab" class="tab-pane fade" id="documentos" role="tabpanel">
				  	<div class="row mt-3 ">
				  		<?php if($listado_documentos->rowCount() != 0): ?>
				  			<?php while($documento = $listado_documentos->fetchObject()): ?>
				  		<div class="col-md-4 mb-3">
				  			<div class="card border-success mb-3">
				  				<div class="card-header bg-transparent border-success titulo-documento"><?=$documento->titulo?></div>
				  				<div class="card-body">
				  					<div class="row text-center">
				  						<div class="col-md-6">
				  							<span class="badge bg-primary fst-italic"><?=$documento->fecha?></span>
				  						</div>
				  						<div class="col-md-6">
				  							<span class="badge bg-dark fst-italic"><?=$documento->formato?></span>
				  						</div>
				  					</div>
				  					<p class="card-text mt-2 tituloActividad"><?=$documento->descripcion?></p>
				  				</div>
				  				<div class="card-footer bg-transparent border-success">
				  					<div class="d-grid gap-2">
				  						<a class="btn btn-outline-success" type="button" download="<?=$documento->documento?>" href="<?=base_url?>documentos/materias/<?=$documento->documento?>">
				  							Descargar
				  						</a>
				  					</div>
				  				</div>
				  			</div>
				  		</div>
				  	<?php endwhile; ?>
				  	<?php else: ?>
				  		<div class="alert alert-danger text-center" role="alert">
				 			El docente no ha registrado documentos en esta materia.
				 		</div>
				  	<?php endif; ?>
				  	</div>
				  </section>
			</section>
		</div>
	</section>
</section>

<!-- Modal  para mostrar el listado de fallas -->
<section class="modal fade" id="listadoFallas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reporte de fallas</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php $f = 0;
				if ($fechas_fallas->rowCount() != 0): ?>
					<table class="table text-center">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									Fecha
								</th>
								<th>
									Periodo
								</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($fechas = $fechas_fallas->fetchObject()):
								$f++;
								?>
								<tr>
									<td>
										<?=$f?>
									</td>
									<td>
										<?=$fechas->fecha_falla?>
									</td>
									<td>
										<?=$fechas->id_periodo_f?>
									</td>
								</tr>
							<?php endwhile;?>
						</tbody>
					</table>
				<?php else: ?>
					<div class="alert alert-danger text-center" role="alert">
						El estudiante no tiene fallas.
					</div>
				<?php endif;?>
			</table>
			</div>
		</div>
	</div>
</section>
</section>
