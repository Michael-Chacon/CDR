<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Iconos
			</h1>
		</article>
	</section>
	<?php Utils::getAlert();?>
	<?php Utils::borrar_error('alert');?>
	<secion class="row justify-content-center">
		<article class="col-md-4 mt-3 mb-3">
			<div class="card shadow" style="">
				<div class="card-body text-center">
					<!-- <h5 class="card-title">Card title</h5> -->
					<span class="valor_item">Registrar icono</span>
					<form action="<?=base_url?>Iconos/guardarIcono" method="post">
						<div class="mb-3 mt-3">
							<label for="icono" class="form-label">Nombre del icono:</label>
							<input type="text" class="form-control" id="icono" placeholder="Nombre del icono" name="icono">
						</div>
						<div class="d-grid">
						<button class=" btn btn-outline-primary btn-sm" type="submit">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</article>
	</secion>
	<section class="row mb-4">
		<article class="col-md-12">
			<section class="row">
				<?php if ($listado_iconos->rowCount()): ?>
					<?php while ($icono = $listado_iconos->fetchObject()): ?>
						<article class="col-md-3 mb-2 mt-2">
							<div class="card  text-center border-0 shadow-sm" style="">
								<div class="card-body">
									<i class="<?=$icono->icono?>" style	="font-size: 2.5rem;"></i>
									<h6 class="card-subtitle mb-2 text-muted user-select-all"><?=$icono->icono?></h6>
									<hr>
									<a href="<?=base_url?>Iconos/eliminar&id=<?=$icono->id_icono?>" class="card-link btn btn-outline-danger 	btn-sm">Eliminar</a>
								</div>
							</div>
						</article>
					<?php endwhile;?>
				<?php else: ?>
					<div class="alert alert-info text-center" role="alert">
						Aún no hay iconos registrados
					</div>
				<?php endif;?>
			</section>
		</article>
	</section>
</section>
