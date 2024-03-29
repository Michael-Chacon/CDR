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
					<h5 class="card-subtitle  text-center"><?php if (!empty($docente->nombre_d) && !empty($docente->apellidos_d)): ?>
						<?=$docente->nombre_d?> <?=$docente->apellidos_d?>
					<?php else: ?>
						No hay docente
					<?php endif;?>
					</h5>
					<p class="text-center text-secondary">Docente</p>
					<p class="text-center"><strong class="correo_d">Correo del docente:</strong> <?php if (!empty($docente->correo_d)): ?>
					<?=$docente->correo_d?></p>
				<?php else: ?>
					sin correo
				<?php endif;?>
					<hr>
					<p class="card-text indicador"><strong>Indicadores de la materia:</strong> <?=$materia->indicadores_mat?></p>
					<p class="indicador"><strong>Área:</strong>
						<?php if (!empty($docente->nombre_area)): ?>
							<?=ucfirst(strtolower($docente->nombre_area))?>
						<?php else: ?>
							No hay docente
						<?php endif;?>
					</p>
					<button type="button" class="btn btn-outline-dark position-relative btn-sm" data-bs-toggle="modal" data-bs-target="#listadoFallas">
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
					<!-- inicio del acordeon con las notas  -->
					<div class="accordion" id="accordionPanelsStayOpenExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#periodouno1" aria-expanded="false" aria-controls="periodouno1">
									Perodo 1
								</button>
							</h2>
							<div id="periodouno1" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
								<div class="accordion-body">
									<section class="row">
										<section class="col-md-6">
											<div class="card text-white border-success mb-3 text-center">
													<div class="card-header bg-transparent border-success titulo-criterio">Cognitivo <span class="badge bg-secondary rounded-pill">
														<?php if (empty($cognitivo->porcentaje_cognitivo)): ?>
															0
														<?php else: ?>
															<?=$cognitivo->porcentaje_cognitivo?>
														<?php endif;?>
														%</span>
													</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Evaluaciones
															(<?php if (empty($cognitivo->porcentaje_evaluacion)): ?>
																0
															<?php else: ?>
																<?=$cognitivo->porcentaje_evaluacion?>
															<?php endif;?>
															%)
															<span class="badge bg-success rounded-pill">
																Nota: <strong><?php if (empty($evaluacionPeriodo1->nota_evaluacion)): ?>
																0
															<?php else: ?>
																<?=$evaluacionPeriodo1->nota_evaluacion?>
																<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trimestal
															(<?php if (empty($cognitivo->porcentaje_trimestral)): ?>
															0
															<?php else: ?>
															<?=$cognitivo->porcentaje_trimestral?>
															<?php endif;?>%)
															<span class="badge bg-success rounded-pill">
																Nota: <strong><?php if (empty($trimestralPeriodo1->nota_trimestral)): ?>
																0
																<?php else: ?>
																<?=$trimestralPeriodo1->nota_trimestral?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
												<div class="card-footer bg-success border-success">Definitiva cognitivo = <span class="badge bg-danger"><?=$definitiva_cognitivoUno?></span></div>
											</div>
										</section>
										<!-- procedimental -->
										<section class="col-md-6">
											<div class="card text-white border-warning mb-3 text-center">
												<div class="card-header bg-transparent border-warning titulo-criterio">Procedimental <span class="badge bg-secondary rounded-pill">
													<?php if (empty($procedimental->porcentaje_procedimental)): ?>
														0
													<?php else: ?>
														<?=$procedimental->porcentaje_procedimental?>
													<?php endif;?>
													%</span>
												</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trabajo individual
															(<?php if (empty($procedimental->porcentaje_Tindividual)): ?>
															0
															<?php else: ?>
																<?=$procedimental->porcentaje_Tindividual?>
															<?php endif;?>
															%)
															<span class="badge bg-warning rounded-pill text-black">
																Nota: <strong><?php if (empty($trabajoIndividualPeriodo1->nota_Tindividual)): ?>
																0
															<?php else: ?>
																<?=$trabajoIndividualPeriodo1->nota_Tindividual?>
															<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trabajo colaborativo
															(<?php if (empty($procedimental->porcentaje_Tcolaborativo)): ?>
															0
															<?php else: ?>
																<?=$procedimental->porcentaje_Tcolaborativo?>
															<?php endif;?>%)
															<span class="badge bg-warning rounded-pill text-black">
																Nota: <strong><?php if (empty($trabajoColaborativoPeriodo1->nota_Tcolaborativo)): ?>
																0
															<?php else: ?>
																<?=$trabajoColaborativoPeriodo1->nota_Tcolaborativo?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
											<div class="card-footer bg-warning border-warning text-black">Definitiva procedimental = <span class="badge bg-danger"><?=$definitiva_procedimentalUno?></span></div>
											</div>
										</section>
										<!-- actitudianal -->
										<section class="col-md-6">
											<div class="card text-white border-primary mb-3 text-center">
												<div class="card-header bg-transparent border-primary titulo-criterio">Actitudinal <span class="badge bg-secondary rounded-pill">
													<?php if (empty($actitudinal->porcentaje_actitudinal)): ?>
														0
													<?php else: ?>
														<?=$actitudinal->porcentaje_actitudinal?>
													<?php endif;?>
													%</span>
												</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Apreciativa
															(<?php if (empty($actitudinal->porcentaje_apreciativa)): ?>
																0
															<?php else: ?>
																<?=$actitudinal->porcentaje_apreciativa?>
															<?php endif;?>
															%)
															<span class="badge bg-primary rounded-pill">
																Nota: <strong><?php if (empty($apreciativaPeriodo1->nota_apreciativa)): ?>
																0
																<?php else: ?>
																<?=$apreciativaPeriodo1->nota_apreciativa?>
																<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Autoevaluacion
															(<?php if (empty($actitudinal->porcentaje_autoevaluacion)): ?>
																0
															<?php else: ?>
																<?=$actitudinal->porcentaje_autoevaluacion?>
															<?php endif;?>%)
															<span class="badge bg-primary rounded-pill">
																Nota: <strong><?php if (empty($autoevaluacionPeriodo1->nota_autoevaluacion)): ?>
																	0
																<?php else: ?>
																	<?=$autoevaluacionPeriodo1->nota_autoevaluacion?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
												<div class="card-footer bg-primary border-primary">Definitiva actitudinal =<span class="badge bg-danger"> <?=$definitiva_actitudinalUno?></span></div>
											</div>
										</section>
										<section class="col-md-6">
											<article class="card text-white bg-danger mb-3">
												<article class="card-body text-center">
													<h5 class="card-title">Nota definitiva del primer periodo</h5>
													<p class="card-text definitiva"><?=$definitiva_periodo1?></p>
												</article>
											</article>
										</section>
									</section>
									<!-- fin del row -->
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#periododos2" aria-expanded="false" aria-controls="periododos2">
									Periodo 2
								</button>
							</h2>
							<div id="periododos2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
								<div class="accordion-body">
									<!-- inicio row -->
									<section class="row">
										<section class="col-md-6">
											<div class="card text-white border-success mb-3 text-center">
													<div class="card-header bg-transparent border-success titulo-criterio">Cognitivo <span class="badge bg-secondary rounded-pill">
														<?php if (empty($cognitivo->porcentaje_cognitivo)): ?>
															0
														<?php else: ?>
															<?=$cognitivo->porcentaje_cognitivo?>
														<?php endif;?>
														%</span>
													</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Evaluaciones
															(<?php if (empty($cognitivo->porcentaje_evaluacion)): ?>
																0
															<?php else: ?>
																<?=$cognitivo->porcentaje_evaluacion?>
															<?php endif;?>
															%)
															<span class="badge bg-success rounded-pill">
																Nota: <strong><?php if (empty($evaluacionPeriodo2->nota_evaluacion)): ?>
																0
															<?php else: ?>
																<?=$evaluacionPeriodo2->nota_evaluacion?>
																<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trimestal
															(<?php if (empty($cognitivo->porcentaje_trimestral)): ?>
															0
															<?php else: ?>
															<?=$cognitivo->porcentaje_trimestral?>
															<?php endif;?>%)
															<span class="badge bg-success rounded-pill">
																Nota: <strong><?php if (empty($trimestralPeriodo2->nota_trimestral)): ?>
																0
																<?php else: ?>
																<?=$trimestralPeriodo2->nota_trimestral?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
												<div class="card-footer bg-success border-success">Definitiva cognitivo = <span class="badge bg-danger"><?=$definitiva_cognitivoDos?></span></div>
											</div>
										</section>
										<!-- procedimental -->
										<section class="col-md-6">
											<div class="card text-white border-warning mb-3 text-center">
												<div class="card-header bg-transparent border-warning titulo-criterio">Procedimental <span class="badge bg-secondary rounded-pill">
													<?php if (empty($procedimental->porcentaje_procedimental)): ?>
														0
													<?php else: ?>
														<?=$procedimental->porcentaje_procedimental?>
													<?php endif;?>
													%</span>
												</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trabajo individual
															(<?php if (empty($procedimental->porcentaje_Tindividual)): ?>
															0
															<?php else: ?>
																<?=$procedimental->porcentaje_Tindividual?>
															<?php endif;?>
															%)
															<span class="badge bg-warning rounded-pill text-black">
																Nota: <strong><?php if (empty($trabajoIndividualPeriodo2->nota_Tindividual)): ?>
																0
															<?php else: ?>
																<?=$trabajoIndividualPeriodo2->nota_Tindividual?>
															<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trabajo colaborativo
															(<?php if (empty($procedimental->porcentaje_Tcolaborativo)): ?>
															0
															<?php else: ?>
																<?=$procedimental->porcentaje_Tcolaborativo?>
															<?php endif;?>%)
															<span class="badge bg-warning rounded-pill text-black">
																Nota: <strong><?php if (empty($trabajoColaborativoPeriodo2->nota_Tcolaborativo)): ?>
																0
															<?php else: ?>
																<?=$trabajoColaborativoPeriodo2->nota_Tcolaborativo?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
											<div class="card-footer bg-transparent border-warning text-black">Definitiva procedimental = <span class="badge bg-danger"><?=$definitiva_procedimentalDos?></span></div>
											</div>
										</section>
										<!-- actitudianal -->
										<section class="col-md-6">
											<div class="card text-white border-primary mb-3 text-center">
												<div class="card-header bg-transparent border-primary titulo-criterio">Actitudinal <span class="badge bg-secondary rounded-pill">
													<?php if (empty($actitudinal->porcentaje_actitudinal)): ?>
														0
													<?php else: ?>
														<?=$actitudinal->porcentaje_actitudinal?>
													<?php endif;?>
													%</span>
												</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Apreciativa
															(<?php if (empty($actitudinal->porcentaje_apreciativa)): ?>
																0
															<?php else: ?>
																<?=$actitudinal->porcentaje_apreciativa?>
															<?php endif;?>
															%)
															<span class="badge bg-primary rounded-pill">
																Nota: <strong><?php if (empty($apreciativaPeriodo2->nota_apreciativa)): ?>
																0
																<?php else: ?>
																<?=$apreciativaPeriodo2->nota_apreciativa?>
																<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Autoevaluacion
															(<?php if (empty($actitudinal->porcentaje_autoevaluacion)): ?>
																0
															<?php else: ?>
																<?=$actitudinal->porcentaje_autoevaluacion?>
															<?php endif;?>%)
															<span class="badge bg-primary rounded-pill">
																Nota: <strong><?php if (empty($autoevaluacionPeriodo2->nota_autoevaluacion)): ?>
																	0
																<?php else: ?>
																	<?=$autoevaluacionPeriodo2->nota_autoevaluacion?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
												<div class="card-footer bg-primary border-primary">Definitiva actitudinal = <span class="badge bg-danger"><?=$definitiva_actitudinalDos?></span></div>
											</div>
										</section>
										<section class="col-md-6">
											<article class="card text-white bg-danger mb-3">
												<article class="card-body text-center">
													<h5 class="card-title">Nota definitiva del segundo periodo</h5>
													<p class="card-text definitiva"><?=$definitiva_periodo2?></p>
												</article>
											</article>
										</section>
									</section>
									<!-- fin row -->
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#periodotres3" aria-expanded="false" aria-controls="periodotres3">
									Periodo 3
								</button>
							</h2>
							<div id="periodotres3" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
								<div class="accordion-body">
									<!-- inicio row -->
									<section class="row">
										<section class="col-md-6">
											<div class="card text-white border-success mb-3 text-center">
													<div class="card-header bg-transparent border-success titulo-criterio">Cognitivo <span class="badge bg-secondary rounded-pill">
														<?php if (empty($cognitivo->porcentaje_cognitivo)): ?>
															0
														<?php else: ?>
															<?=$cognitivo->porcentaje_cognitivo?>
														<?php endif;?>
														%</span>
													</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Evaluaciones
															(<?php if (empty($cognitivo->porcentaje_evaluacion)): ?>
																0
															<?php else: ?>
																<?=$cognitivo->porcentaje_evaluacion?>
															<?php endif;?>
															%)
															<span class="badge bg-success rounded-pill">
																Nota: <strong><?php if (empty($evaluacionPeriodo3->nota_evaluacion)): ?>
																0
															<?php else: ?>
																<?=$evaluacionPeriodo3->nota_evaluacion?>
																<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trimestal
															(<?php if (empty($cognitivo->porcentaje_trimestral)): ?>
															0
															<?php else: ?>
															<?=$cognitivo->porcentaje_trimestral?>
															<?php endif;?>%)
															<span class="badge bg-success rounded-pill">
																Nota: <strong><?php if (empty($trimestralPeriodo3->nota_trimestral)): ?>
																0
																<?php else: ?>
																<?=$trimestralPeriodo3->nota_trimestral?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
												<div class="card-footer bg-success border-success">Definitiva cognitivo = <span class="badge bg-danger"><?=$definitiva_cognitivoTres?></span></div>
											</div>
										</section>
										<!-- procedimental -->
										<section class="col-md-6">
											<div class="card text-white border-warning mb-3 text-center ">
												<div class="card-header bg-transparent border-warning titulo-criterio">Procedimental <span class="badge bg-secondary rounded-pill">
													<?php if (empty($procedimental->porcentaje_procedimental)): ?>
														0
													<?php else: ?>
														<?=$procedimental->porcentaje_procedimental?>
													<?php endif;?>
													%</span>
												</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trabajo individual
															(<?php if (empty($procedimental->porcentaje_Tindividual)): ?>
															0
															<?php else: ?>
																<?=$procedimental->porcentaje_Tindividual?>
															<?php endif;?>
															%)
															<span class="badge bg-warning rounded-pill text-black">
																Nota: <strong><?php if (empty($trabajoIndividualPeriodo3->nota_Tindividual)): ?>
																0
															<?php else: ?>
																<?=$trabajoIndividualPeriodo3->nota_Tindividual?>
															<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Trabajo colaborativo
															(<?php if (empty($procedimental->porcentaje_Tcolaborativo)): ?>
															0
															<?php else: ?>
																<?=$procedimental->porcentaje_Tcolaborativo?>
															<?php endif;?>%)
															<span class="badge bg-warning rounded-pill text-black">
																Nota: <strong><?php if (empty($trabajoColaborativoPeriodo3->nota_Tcolaborativo)): ?>
																0
															<?php else: ?>
																<?=$trabajoColaborativoPeriodo3->nota_Tcolaborativo?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
											<div class="card-footer bg-warning border-warning text-black">Definitiva procedimental = <span class="badge bg-danger"><?=$definitiva_procedimentalTres?></span></div>
											</div>
										</section>
										<!-- actitudianal -->
										<section class="col-md-6">
											<div class="card text-white border-primary mb-3 text-center">
												<div class="card-header bg-transparent border-primary titulo-criterio">Actitudinal <span class="badge bg-secondary rounded-pill">
													<?php if (empty($actitudinal->porcentaje_actitudinal)): ?>
														0
													<?php else: ?>
														<?=$actitudinal->porcentaje_actitudinal?>
													<?php endif;?>
													%</span>
												</div>
												<div class="card-body">
													<ul class="list-group">
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Apreciativa
															(<?php if (empty($actitudinal->porcentaje_apreciativa)): ?>
																0
															<?php else: ?>
																<?=$actitudinal->porcentaje_apreciativa?>
															<?php endif;?>
															%)
															<span class="badge bg-primary rounded-pill">
																Nota: <strong><?php if (empty($apreciativaPeriodo3->nota_apreciativa)): ?>
																0
																<?php else: ?>
																<?=$apreciativaPeriodo3->nota_apreciativa?>
																<?php endif;?></strong>
															</span>
														</li>
														<li class="list-group-item d-flex justify-content-between align-items-center">
															Autoevaluacion
															(<?php if (empty($actitudinal->porcentaje_autoevaluacion)): ?>
																0
															<?php else: ?>
																<?=$actitudinal->porcentaje_autoevaluacion?>
															<?php endif;?>%)
															<span class="badge bg-primary rounded-pill">
																Nota: <strong><?php if (empty($autoevaluacionPeriodo3->nota_autoevaluacion)): ?>
																	0
																<?php else: ?>
																	<?=$autoevaluacionPeriodo3->nota_autoevaluacion?>
																<?php endif;?></strong>
															</span>
														</li>
													</ul>
												</div>
												<div class="card-footer bg-primary border-primary">Definitiva actitudinal = <span class="badge bg-danger"><?=$definitiva_actitudinalTres?></span></div>
											</div>
										</section>
										<section class="col-md-6">
											<article class="card text-white bg-danger mb-3">
												<article class="card-body text-center">
													<h5 class="card-title">Nota definitiva del tercer periodo</h5>
													<p class="card-text definitiva"><?=$definitiva_periodo3?></p>
												</article>
											</article>
										</section>
									</section>
									<!-- fin row -->
								</div>
							</div>
						</div>
					</div>
					<!-- fin del acordeon con las notas -->
				</section>
				 <section aria-labelledby="actividades-tab" class="tab-pane fade" id="actividades" role="tabpanel">
				 	<section class="row mt-3 p-2">
				 	<?php if ($listado_actividades->rowCount() != 0): ?>
				 		<?php while ($actividad = $listado_actividades->fetchObject()): ?>
				 			<div class="col-md-6 mb-3">
				 				<!-- inicio -->
				 				<section class="card text-black mb-3 shadow">
				 					<article class="card-body">
				 						<div class="row mb-0">
				 							<div class="col-md-12 mt-0 mb-0">
				 								<h6 class="card-title tituloActividad">
				 									<?=$actividad->titulo_actividad?>
				 								</h6>
				 							</div>
				 							<span class="mt-0 haceTiempo">
				 								Publicado <?=Utils::difernciaParaHumanos($actividad->fechaRegistro)?>
				 							</span>
				 						</div>
				 						<p class="text-black">
				 							<?=$actividad->descripcion?>
				 						</p>
				 						<h6 class="titulo-menu">
				 							<small><?=Utils::fechaCarbon($actividad->fecha)?></small>
				 						</h6>
				 						<p class="subtexto">Fecha actividad</p>
				 					</article>
				 				</section>
				 				<!-- fin -->
				 			</div>
				 		<?php endwhile;?>
				 	<?php else: ?>
				 		<div class="alert alert-danger text-center" role="alert">
				 			El docente no ha registrado actividades en esta materia.
				 		</div>
				 	<?php endif;?>
				 	</section>
				 </section>
				  <section aria-labelledby="documentos-tab" class="tab-pane fade" id="documentos" role="tabpanel">
				  	<section class="row mt-3 p-2">
				  		<?php if ($listado_documentos->rowCount() != 0): ?>
				  			<?php while ($datos_documetos = $listado_documentos->fetchObject()): ?>
				  				<div class="col-md-6 mb-3">
				  					<section class="card mb-3 shadow">
				  						<article class="card-body">
				  							<section class="row">
				  								<span class="col-xs-9 col-sm-9 col-md-9">
				  									<?=$datos_documetos->titulo?>
				  								</span>
				  								<span class="col-xs-3 col-sm-3 col-md-3 text-success formatoDoc">
				  									<?=$datos_documetos->formato?>
				  								</span>
				  								<p class="mt-0 haceTiempo">
				  									Publicado <?=Utils::difernciaParaHumanos($datos_documetos->fechaRegistro)?>
				  								</p>
				  							</section>
				  							<p class="card-text text-documento">
				  								<?=$datos_documetos->descripcion?>
				  							</p>
				  							<?php if($datos_documetos->fecha !== '0000-00-00'): ?>
				  								<h6 class="titulo-menu text-center">
				  									<small><?=Utils::fechaCarbon($datos_documetos->fecha)?></small>
				  								</h6>
				  								<p class="subtexto text-center">Fecha actividad</p>
				  							<?php endif; ?>
				  							<div class="row justify-content-center">
				  								<div class="col-md-4">
				  									<a class="link-success" download="<?=$datos_documetos->documento?>" href="<?=base_url?>documentos/materias/<?=$datos_documetos->documento?>">
				  										Descargar
				  									</a>
				  								</div>
				  							</div>
				  						</article>
				  					</section>
				  				</div>
				  			<?php endwhile;?>
				  		<?php else: ?>
				  			<div class="alert alert-danger text-center" role="alert">
				  				El docente no ha registrado documentos en esta materia.
				  			</div>
				  		<?php endif;?>
				  	</section>
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
										<?= Utils::fechaCarbon($fechas->fecha_falla)?>
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
