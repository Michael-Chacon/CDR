<section class="container-fluid">
	<section class="row titulo">
		<article class="col-md-12">
			<h1 class="text-center config">
				<i class="bi bi-sunglasses"></i>
				Mis observaciones
			</h1>
		</article>
	</section>
	<section class="row mt-5">
		<?php if ($observaciones->rowCount() != 0): ?>
			<?php while ($observacion = $observaciones->fetchObject()): ?>
				<section class="col-md-6 mb-4">
					<div class="card shadow">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-8">
									<h5 class="card-title text-center valor_item"><?=$observacion->docente?></h5>
									<h6 class="card-subtitle mb-2 text-muted text-center">observacion realizada por</h6>
								</div>
								<div class="col-md-4">
									<h5 class="card-title text-center valor_item"><?=$observacion->fecha_ob?></h5>
									<h6 class="card-subtitle mb-2 text-muted text-center">Fecha de la observación</h6>
								</div>
							</div>
							<hr>
							<span class="valor_item">Observación:</span>
							<p class="card-text texto-medio"><?=$observacion->observacion?></p>

							<span class="valor_item">Acciones:</span>
							<p class="card-text texto-medio"><?=$observacion->acciones?></p>
						</div>
					</div>
				</section>
			<?php endwhile;?>
		<?php else: ?>
		<div class="alert alert-primary text-center" role="alert">
			No tienes observaciones registradas.
		</div>
	<?php endif;?>
	</section>
</section>