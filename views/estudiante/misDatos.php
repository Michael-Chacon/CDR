<section class="container-fluid">
<section class="row titulo">
	<article class="col-md-12">
		<h1 class="text-center config">
			<i class="bi bi-info-circle"></i>
			Mis datos
		</h1>
	</article>
</section>
	<section class="row  mt-5 mb-5">
		<?php Utils::getAlert();?>
		<?php Utils::borrar_error('alert');?>
		<section class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="card shadow">
				<div class="card-body">
					<div class="text-center mb-2">
						<img class="avatar circulo" src="<?=base_url?>photos/estudiantes/<?=$_SESSION['student']['img']?>">
						<h5 class="card-title"><?=$_SESSION['student']['nombre_e']?> <?=$_SESSION['student']['apellidos_e']?></h5>
						<h6 class="card-subtitle mb-2 text-muted">Estudiante</h6>
					<a href="#" class="card-link btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#datos-estudiante">Editar mis datos</a>
					</div>
					<div class="row text-center">
						<div class="col-md-6 mt-3">
							<span class="item_info">Fecha de nacimiento:</span> <span class="valor_item"><?=$_SESSION['student']['fecha_nacimiento_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Edad: </span> <span class="valor_item"><?=Utils::hallarEdad($_SESSION['student']['fecha_nacimiento_e'])?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Tipo idantificacion:</span> <span class="valor_item"><?=$_SESSION['student']['tipo_identificacion_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Número identifición:</span> <span class="valor_item"><?=$_SESSION['student']['numero_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Lugar de expedición:</span> <span class="valor_item"><?=$_SESSION['student']['lugar_expedicion_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Fecha de expedición:</span> <span class="valor_item"><?=$_SESSION['student']['fecha_expedicion_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Dirección de residencia:</span> <span class="valor_item"><?=$_SESSION['student']['direccion_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Telefono:</span> <span class="valor_item"><?=$_SESSION['student']['telefono_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Correo:</span> <span class="valor_item"><?=$_SESSION['student']['correo_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Religion:</span> <span class="valor_item"><?=$_SESSION['student']['religion_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Grupo sanguíneo + RH:</span> <span class="valor_item"><?=$_SESSION['student']['grupo_sanguineo_e']?> <?=$_SESSION['student']['rh_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Incapacidad medica:</span> <span class="valor_item"><?=$_SESSION['student']['incapacidad_medica_e']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Tranasporte:</span> <span class="valor_item"><?=$_SESSION['student']['transporte']?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">PAE:</span> <span class="valor_item"><?=$_SESSION['student']['pae']?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="text-center mb-2">
						<img class="avatar circulo" src="<?=base_url?>photos/estudiantes/familia.jpg">
						<h5 class="card-title">Padres de <?=$_SESSION['student']['nombre_e']?></h5>
						<h6 class="card-subtitle mb-2 text-muted">Familia</h6>
						<a href="#" class="card-link btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#datos-padres">Editar datos de mis padres</a>
					</div>
					<div class="row text-center">
						<span class="valor_item">Madre</span>
						<?php if (!empty($padres->nombre_m)): ?>
							<div class="col-md-6 mt-3">
								<span class="item_info">Nombre: </span>	<span class="valor_item"><?=$padres->nombre_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Apellidos: </span>	<span class="valor_item"><?=$padres->apellidos_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Fecha de nacimiento: </span>	<span class="valor_item"><?=$padres->fecha_nacimiento_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Edad: </span>	<span class="valor_item"><?=Utils::hallarEdad($padres->fecha_nacimiento_m)?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Tipo identifición: </span>	<span class="valor_item"><?=$padres->tipo_identificacion_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Número identifición: </span>	<span class="valor_item"><?=$padres->numero_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Lugar de expedición: </span>	<span class="valor_item"><?=$padres->lugar_expedicion_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Fecha expedición: </span>	<span class="valor_item"><?=$padres->fecha_expedicion_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Telefono: </span>	<span class="valor_item"><?=$padres->telefono_m?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Ocupación: </span>	<span class="valor_item"><?=$padres->ocupacion_m?></span>
							</div>
						<?php else: ?>
							<div class="alert alert-danger" role="alert">
								No hay información de la mamá.
							</div>
						<?php endif;?>
						<hr/>
						<span class="valor_item">Padre</span>
						<?php if (!empty($padres->nombre_p)): ?>
							<div class="col-md-6 mt-3">
								<span class="item_info">Nombre: </span>	<span class="valor_item"><?=$padres->nombre_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Apellidos: </span>	<span class="valor_item"><?=$padres->apellidos_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Fecha de nacimiento: </span>	<span class="valor_item"><?=$padres->fecha_nacimiento_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Edad: </span>	<span class="valor_item"><?=Utils::hallarEdad($padres->fecha_nacimiento_p)?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Tipo identifición: </span>	<span class="valor_item"><?=$padres->tipo_identificacion_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Número identifición: </span>	<span class="valor_item"><?=$padres->numero_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Lugar de expedición: </span>	<span class="valor_item"><?=$padres->lugar_expedicion_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Fecha expedición: </span>	<span class="valor_item"><?=$padres->fecha_expedicion_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Telefono: </span>	<span class="valor_item"><?=$padres->telefono_p?></span>
							</div>
							<div class="col-md-6 mt-3">
								<span class="item_info">Ocupación: </span>	<span class="valor_item"><?=$padres->ocupacion_p?></span>
							</div>
						<?php else: ?>
							<div class="alert alert-danger" role="alert">
								No hay información del papá.
							</div>
						<?php endif;?>
						<hr/>
						<span class="valor_item">Otros datos</span>
						<div class="col-md-6 mt-3">
							<span class="item_info">Dirección: </span>	<span class="valor_item"><?=$padres->direccion?></span>
						</div>
						<div class="col-md-6 mt-3">
							<span class="item_info">Correo: </span>	<span class="valor_item"><?=$padres->correo?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!-- Modal para actualizar los datos del estudiante -->
	<section class="modal fade" id="datos-estudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar mis datos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?=base_url?>Student/actualizarDatosEstudiante" method="post">
					<div class="modal-body">
						<div class="row">
							<span class="valor_item mb-3 text-center">Datos que puedes actualizar</span>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="ed" class="form-label">Dirección:</label>
									<input type="text" class="form-control" id="ed" name="direccion_e" value="<?=$_SESSION['student']['direccion_e']?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="et" class="form-label">Telefono:</label>
									<input type="number" class="form-control" id="et" name="telefono_e" value="<?=$_SESSION['student']['telefono_e']?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="ce" class="form-label">Correo:</label>
									<input type="email" class="form-control" id="ce" name="correo_e" value="<?=$_SESSION['student']['correo_e']?>">
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
	<!-- Modal  para  actualizar los datos de los padres-->
	<section class="modal fade" id="datos-padres" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos de mis padres</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?=base_url?>Student/actualizarDatosPadres" method="post">
					<div class="modal-body">
						<div class="row">
							<span class="valor_item mb-3 text-center">Datos que puedes actualizar</span>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="mt" class="form-label">Telefono mamá:</label>
									<input type="number" class="form-control" id="mt" name="telefono_m" value="<?=$padres->telefono_m?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="pt" class="form-label">Telefono papá:</label>
									<input type="number" class="form-control" id="pt" name="telefono_p" value="<?=$padres->telefono_p?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="d" class="form-label">Dirección:</label>
									<input type="text" class="form-control" id="d" name="direccion_pm" value="<?=$padres->direccion?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="c" class="form-label">Correo:</label>
									<input type="email" class="form-control" id="c" name="correo_pm" value="<?=$padres->correo?>">
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