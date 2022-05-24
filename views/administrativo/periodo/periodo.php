<div class="container-fluid">
	<section class="row  titulo mb-5">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				<i class="bi bi-calendar2-range"></i>
				Periodos académicos
			</h1>
		</article>
	</section>
	<?php echo Utils::getAlert(); ?>
	<?php Utils::borrar_error('alert');?>


	<section class="row justify-content-center">
		<small class="text-center mb-2">aaaa/mm/dd</small>
		<?php if ($listado->rowCount() != 0):
			while ($periodo = $listado->fetchObject()): ?>
				<section class="col-xs-6 col-sm-6 col-md-6 col-lg-3 ">
					<article class="card text-white bg-dark mb-3 efecto_hover_periodo">
						<div class="card-header text-center">
							<article class="row">
								<article class="col-10">
									<h5 class="card-title espezor">
										<?=$periodo->nombre_periodo;?>
									</h5>
								</article>
								<?php if(isset($_SESSION['user'])): ?>
									<article class="col-2">
										<a href="<?=base_url?>Periodo/vista_actualizar&id_periodo=<?=$periodo->id?>&name=<?=$periodo->nombre_periodo?>" id="menu_periodo"  type="button" aria-expanded="false">
											<i class="bi bi-pen editar" style="color: #09B080;"></i>
										</a>
									</article>
								<?php endif; ?>
							</article>
						</div>
						<div class="card-body bg-dark">
							<table class="table table-dark table-striped text-white ">
								<tbody>
									<tr>
										<td>
											<i class="bi bi-caret-right">
											</i>
											Inicio:
										</td>
										<td>
											<?=$periodo->fecha_inicio;?>
										</td>
									</tr>
									<tr>
										<td>
											<i class="bi bi-flag">
											</i>
											Fin:
										</td>
										<td>
											<?=$periodo->fecha_fin;?>
										</td>
									</tr>
									<tr>
										<td>
											<i class="bi bi-activity">
											</i>
											Estado:
										</td>
										<td>
											<span class="badge <?=$periodo->estado;?>">
												<?=$periodo->estado;?>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</article>
				</section>
			<?php endwhile;
		else: ?>
			<div class="alert alert-danger" role="alert">
				No existen periodos académicos.
			</div>
		<?php endif;?>
	</section>
</section>
<!--fin del container -->

<!-- fin del contenido de la pagina -->
</div>