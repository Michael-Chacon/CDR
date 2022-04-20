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
									<?php if ($docente->img == null): ?>
										<img alt="" class="avatar-perfil-d" src="<?=base_url?>helpers/img/avatar.jpg"></img>
									<?php else: ?>
										<img alt="" class="avatar-perfil-d" src="<?=base_url?>photos/docentes/<?=$docente->img?>"></img>
									<?php endif;?>
							</article>
						</article>
					</div>
					<h5 class="card-subtitle  text-center"><?=$docente->nombre_d?> <?=$docente->apellidos_d?></h5>
					<p class="text-center subtitulo"><?=$docente->nombre_pregrado_d?></p>
					<p class="text-center"><strong class="correo_d">Correos del docente:</strong> <?=$docente->correo_d?></p>
					<hr>
					<p class="card-text indicador fst-italic"><strong>Indicadores de la materia:</strong> <?=$materia->indicadores_mat?></p>
					<p class="indicador"><strong>Área:</strong> <?=ucfirst(strtolower($docente->nombre_area))?>.</p>
					<!-- <a href="#" class="card-link">Card link</a>
					<a href="#" class="card-link">Another link</a> -->
				</div>
			</div>
		</section>
	</section>
	<section class="col-md-8">
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
				 	<?php if($listado_actividades->rowCount() != 0): ?>
				 		<?php while($actividad = $listado_actividades->fetchObject()): ?>
				 			<div class="card text-center " >
				 				<div class="card-body">
				 					<h5 class="card-title "><?=$actividad->titulo_actividad?> <span class="punto-bien"> ●</span> </h5>
				 					<h6 class="card-subtitle mb-2 text-muted"><?=$actividad->fecha?></h6>
				 					<p class="card-text tituloActividad fst-italic"><?=$actividad->descripcion?></p>
				 				</div>
				 			</div>
				 		<?php endwhile; ?>
				 	<?php else: ?>
				 		<h4>no Hay actividades</h4>
				 	<?php endif; ?>
				 </section>
				  <section aria-labelledby="documentos-tab" class="tab-pane fade" id="documentos" role="tabpanel">
				  	<h3>documentos</h3>
				  </section>
			</section>
		</div>
	</section>
</section>
</section>
