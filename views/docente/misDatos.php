<section class="container-fluid">
	<section class="row titulo">
		<article class="col-md-12">
			<h1 class="text-center config">
				<i class="bi bi-info-circle"></i>
				Mis datos
			</h1>
		</article>
	</section>
	<!-- inicio info docente -->
	<section class="row justify-content-center mt-5">
		<?php echo Utils::general_alerts('actualizarDatosDeDocente', 'Datos actualizados con éxito', 'Algo salió mal al intentar acualizar los datos.') ?>
		<?php Utils::borrar_error('actualizarDatosDeDocente'); ?>
		<section class="col-md-8">
			<div class="card shadow">
				<div class="card-body">
					<div class="text-center mb-2">
						<img class="avatar circulo" src="<?=base_url?>photos/docentes/<?=$_SESSION['teacher']->img?>">
						<h5 class="card-title"><?=$_SESSION['teacher']->nombre_d?> <?=$_SESSION['teacher']->apellidos_d?></h5>
						<h6 class="card-subtitle mb-2 text-muted">Docente</h6>
					<a href="#" class="card-link btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#datos-docente">Editar mis datos</a>
					</div>
					<div class="row text-center">
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Fecha nacimiento:</span> <span class="valor_item"><?=$docente->fecha_nacimiento_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Edad:</span> <span class="valor_item"><?=Utils::hallarEdad($docente->fecha_nacimiento_d)?></span> <small class="text-muted">(años)</small>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Genero:</span> <span class="valor_item"><?=$docente->sexo_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Tipo identificación:</span> <span class="valor_item"><?=$docente->tipo_identificacion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Numero identificación:</span> <span class="valor_item"><?=$docente->numero_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Lugar de expedición:</span> <span class="valor_item"><?=$docente->lugar_expedicion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Fecha expedición:</span> <span class="valor_item"><?=$docente->fecha_expedicion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Dirección:</span> <span class="valor_item"><?=$docente->direccion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Telefono:</span> <span class="valor_item"><?=$docente->telefono_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Correo:</span> <span class="valor_item"><?=$docente->correo_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Religión:</span> <span class="valor_item"><?=$docente->religion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Incapacidad medica:</span> <span class="valor_item"><?=$docente->incapacidad_medica_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Grupo sanguíneo + Rh:</span> <span class="valor_item"><?=$docente->grupo_sanguineo_d?> <?=$docente->rh_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Fecha posesión:</span> <span class="valor_item"><?=$docente->fecha_expedicion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Número acta de posesión:</span> <span class="valor_item"><?=$docente->numero_acta_posesion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Número resolución posesión:</span> <span class="valor_item"><?=$docente->numero_resolucion_posesion_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Pregrado:</span> <span class="valor_item"><?=$docente->pregrado_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Nombre pregrado:</span> <span class="valor_item"><?=$docente->nombre_pregrado_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Posgrado:</span> <span class="valor_item"><?=$docente->posgrado_d?></span>
						</div>
						<div class="col-md-4 mt-3 mb-3">
							<span class="item_info">Nombre posgrado:</span> <span class="valor_item"><?=$docente->nombre_posgrado_d?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!-- fin info docente -->
	<!-- Modal para actualizar los datos del estudiante -->
	<section class="modal fade" id="datos-docente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar mis datos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?=base_url?>Teacher/actualizarDatosDeDocente" method="post">
					<div class="modal-body">
						<div class="row">
							<span class="valor_item mb-3 text-center">Datos que puedes actualizar</span>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="ed" class="form-label">Dirección:</label>
									<input type="text" class="form-control" id="ed" name="direccion_d" value="<?=$docente->direccion_d?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="et" class="form-label">Telefono:</label>
									<input type="number" class="form-control" id="et" name="telefono_d" value="<?=$docente->telefono_d?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="ce" class="form-label">Correo:</label>
									<input type="email" class="form-control" id="ce" name="correo_d" value="<?=$docente->correo_d?>">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</section>