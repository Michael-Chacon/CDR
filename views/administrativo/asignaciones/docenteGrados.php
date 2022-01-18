<!-- vista donde se listan los grados en los que estan matriculados los docentes, para asignarle materias -->
<section class="container-fluid">
	 <article class="row justify-content-center">
	 	<!-- <?php $docente = $_GET['id_docente']?> -->
			<?php if (isset($lista)):
    				while ($grados = $lista->fetchObject()): ?>
								<article class="col-xs-12 col-sm-6 col-md-3 col-xl-3 mb-2">
									<div class="card text-center shadow option">
										<div class="card-body contenido-card">
											<h2 class="mt-2 grados">
												<?=$grados->nombre_g?>°
											</h2>
											<hr class="hr-perfil"/>
											<a class="stretched-link" href="<?=base_url?>Asignaciones/vista_Amaterias&id_grado=<?=$grados->id?>&nombre=<?=$grados->nombre_g?> &docente=<?=$docente?>">
											</a>
										</div>
									</div>
								</article>
						<?php endwhile;
					endif;?>
	</article>
</section>