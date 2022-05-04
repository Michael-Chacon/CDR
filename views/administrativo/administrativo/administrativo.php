 <!-- contenido de  la pagina -->
 <section class="container-fluid">
 	<section class="row shadow titulo">
 		<article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
 			<h1 class="text-center config">
 				Administrativos
 			</h1>
 		</article>
 		<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
 			<a data-bs-target="#crearDocente" data-bs-toggle="modal" type="button">
 				<i class="bi bi-person-plus efecto_hover" style="font-size: 2rem; color: white;">
 				</i>
 			</a>
 		</article>
 	</section>
 	<?php echo Utils::general_alerts('administrativo', 'El usuario administrativo se ha registrado con éxito.', 'Algo salió mal al registrar el usuario administrativo, inténtelo de nuevo.'); ?>
 	<?php echo Utils::general_alerts('credencial_a', 'Se asignaron credenciales al usuario administrativo con éxito.', 'Algo salió mal al asignar credencale al usuario administartivo, inténtelo de nuevo.'); ?>
 	<?php echo Utils::general_alerts('validacion_a', '', 'Se encontró un usuario administrativo en la base de datos con el mismo número de documento, posiblemente este administrativo ya existe en la plataforma.') ?>
 	<?php echo Utils::general_alerts('actualizarA', 'Información del usuario actualizada con éxito.', 'Algo salió mal al actualizar la información, inténtelo de nuevo.') ?>
 	<?php echo Utils::general_alerts('cambiarPassA', 'Contraseña actualizada con éxito.', 'Algo salió mal al cambiar la contraseña, inténtelo de nuevo.'); ?>
 	<?php Utils::borrar_error('administrativo');
 	Utils::borrar_error('credencial_a');
 	Utils::borrar_error('validacion_a');
 	Utils::borrar_error('actualizarA');
 	Utils::borrar_error('cambiarPassA');
 	?>
 	<section class="container-fluid">
 		<section class="row justify-content-center mt-3">
 			<article class="col-md-3">
 				<a href="<?=base_url?>Pdf/listadoAdministrativos" class="btn btn-success btn-sm">Listado de adminstrativos en PDF</a>
 			</article>
 		</section>
 	</section>
 	<!-- card -->
 	<section class="row mt-2">
 		<?php if (isset($listado) && $listado->rowCount() != 0):
 		while ($administrativo = $listado->fetchObject()): ?>
 			<div class="col-md-6 mt-3 mb-5">
 				<div class="card shadow">
 					<div class="card-body ">
 						<div class="row ">
 							<div class="col-3 text-center">
 								<img alt="" class="avatar circulo " src="<?=base_url?>helpers/img/obito.png">
 							</img>
 						</div>
 						<div class="col-8">
 							<h5 class="card-title nombre_personal">
 								<?=$administrativo->nombre_a;?> <?=$administrativo->apellidos_a;?>
 							</h5>
 							<p class="card-text">
 								<span class="badge insignia_cargo text-center">
 									<i class="bi bi-person-check">
 									</i>
 									<?=$administrativo->cargo_a?>
 								</span>
 								<span class="badge insignia">
 									<i class="bi bi-telephone">
 									</i>
 									<?=$administrativo->telefono_a?>
 								</span>
 								<span class="badge insignia">
 									<i class="bi bi-file-earmark">
 									</i>
 									id: <?=$administrativo->numero_a?>
 								</span>
 								<span class="badge insignia">
 									<i class="bi bi-envelope-open">
 									</i>
 									<?=$administrativo->correo_a?>
 								</span>
 							</p>
 						</div>
 						<div class="col-1">
 							<a aria-expanded="false" data-bs-toggle="dropdown" type="button">
 								<i class="bi bi-three-dots-vertical" style="font-size: 1.5rem;">
 								</i>
 							</a>
 							<ul class="dropdown-menu">
 								<li>
 									<a class="dropdown-item" href="<?=base_url?>Administrativo/actualizar&id=<?=$administrativo->id?>">
 										<i class="bi bi-pen">
 										</i>
 										Editar
 									</a>
 								</li>
 								<li>
 									<a class="dropdown-item" href="<?=base_url?>Administrativo/newPassword&id=<?=$administrativo->id?>">
 										<i class="bi bi-key">
 										</i>
 										Cambiar contaseña
 									</a>
 								</li>
 								<li>
 									<a class="dropdown-item" href="#">
 										<i class="bi bi-trash">
 										</i>
 										Eliminar
 									</a>
 								</li>
 							</ul>
 						</div>
 					</div>
 				</div>
 				<section class="row mt-3">
 					<article class="col-12">
 						<div class="accordion" id="accordionExample2">
 							<div class="accordion-item">
 								<h2 class="accordion-header" id="heading3">
 									<button aria-controls="collapse3" aria-expanded="false" class="accordion-button collapsed text-center" data-bs-target="#collapse<?=$administrativo->id?>" data-bs-toggle="collapse" type="button">
 										<i class="bi bi-info-circle-fill">
 										</i>
 										Información
 									</button>
 								</h2>
 								<div aria-labelledby="heading3" class="accordion-collapse collapse" data-bs-parent="#accordionExample2" id="collapse<?=$administrativo->id?>">
 									<div class="accordion-body">
 										<table class="table table-striped table-hover">
 											<tbody>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Dirección:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->direccion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Fecha de nacimiento:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->fecha_nacimiento_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Edad:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=Utils::hallarEdad($administrativo->fecha_nacimiento_a)?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Lugar expedición id:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->lugar_expedicion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Fecha de expedición id:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->fecha_expedicion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Religión:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->religion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Incapacidad medica:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->incapacidad_medica_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Grupo sanguíneo + Rh:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->grupo_sanguineo_a?> <?=$administrativo->rh_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Fecha posesión:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->fecha_posesion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Número acta posesión:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->numero_acta_posesion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Número resolución posesión:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->numero_resolucion_posesion_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Pregrado:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->nombre_pregrado_a?>
 														</span>
 													</td>
 												</tr>
 												<tr>
 													<td>
 														<p class="titulo_info">
 															Posgrado:
 														</p>
 													</td>
 													<td>
 														<span class="detalle_info">
 															<?=$administrativo->nombre_posgrado_a?>
 														</span>
 													</td>
 												</tr>
 											</tbody>
 										</table>
 									</div>
 								</div>
 							</div>
 						</div>
 					</article>
 				</section>
 			</div>
 		</div>
 	<?php endwhile;?>
 <?php else: ?>
 	<div class="alert alert-danger text-center" role="alert">
 		No hay usuarios administrativos registrados
 	</div>
 <?php endif;?>
</section>
<!-- fin del card -->
<!-- fin del container en la etiqueta de abajo -->
</section>
<!-- inicio del modal registrar administrativo -->
<article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="crearDocente" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Registrar Administrativo
				</h5>
				<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
				</button>
			</div>
			<h5 class="text-center mt-4">Administrativo</h5>
			<form action="<?=base_url?>Administrativo/registrarAdministrativo" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input class="form-control" id="nombre" name="nombres" placeholder="Nombre" required="" type="text">
								<label for="nombre">
									Nombres:
								</label>
							</input>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-floating mb-3">
							<input class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required="" type="text">
							<label for="apellidos">
								Apellidos:
							</label>
						</input>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-floating mb-3">
						<input class="form-control" id="nacimienito" name="nacimiento" placeholder="nacimiento" required="" type="date">
						<label for="nacimienito">
							Fecha de nacimiento:
						</label>
					</input>
				</div>
			</div>
	</div>
	<h5 class="text-center mt-5">
		<i class="bi bi-fingerprint"></i> Identificación
	</h5>
	<div class="row">
		<div class="col-md-6">
			<div class="form-floating mb-3">
				<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo" required="">
					<option value="cedula">
						Cedula
					</option>
					<option value="tarjeta">
						Tarjeta
					</option>
					<option value="contraseña">
						Contraseña
					</option>
					<option value="otro">
						Otro
					</option>
				</select>
				<label for="incapacidad">
					Tipo:
				</label>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-floating mb-3">
				<input class="form-control" id="numero" name="numero" placeholder="Numero" required="" type="number">
				<label for="numero">
					Numero:
				</label>
			</input>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="expedicion" name="expedicion" placeholder="expedicion" required="" type="text">
			<label for="expedicion">
				Lugar de expedición:
			</label>
		</input>
	</div>
</div>
<div class="col-md-6">
	<div class="form-floating mb-3">
		<input class="form-control" id="fecha" name="fecha" placeholder="fecha" required="" type="date">
		<label for="fecha">
			Fecha de expedición:
		</label>
	</input>
</div>
</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="sexo" required="">
				<option>
				</option>
				<option value="masculino">
					Masculino
				</option>
				<option value="femenino">
					Fememino
				</option>
				<option value="otro">
					Otro
				</option>
			</select>
			<label for="incapacidad">
				Género:
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="cargo" required="">
				<option>
				</option>
				<option value="rector">
					Rectora/Rector
				</option>
				<option value="coordinador">
					Coordinadora/Coordinador
				</option>
				<option value="secretario">
					Secretario/Secretaria
				</option>
			</select>
			<label for="incapacidad">
				Cargo:
			</label>
		</div>
	</div>
</div>
<h5 class="text-center mt-5">
	<i class="bi bi-geo-alt"></i> Ubicación
</h5>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="direccion" name="direccion" placeholder="direccion" required="" type="text">
			<label for="direccion">
				Dirección:
			</label>
		</input>
	</div>
</div>
<div class="col-md-6">
	<div class="form-floating mb-3">
		<input class="form-control" id="telefono" name="telefono" placeholder="telefono" required="" type="number">
		<label for="telefono">
			Número de celular:
		</label>
	</input>
</div>
</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="correo" name="correo" placeholder="correo" required="" type="email">
			<label for="correo">
				Correo electrónico:
			</label>
		</input>
	</div>
</div>
</div>
<h5 class="text-center mt-5">
	<i class="bi bi-pen"></i> Otros
</h5>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="religion" name="religion" placeholder="religion"  type="text">
			<label for="religion">
				Religión:
			</label>
		</input>
	</div>
</div>
<div class="col-md-6">
	<div class="form-floating mb-3">
		<input class="form-control" id="incapacidad" name="incapacidad" placeholder="incapacidad" required="" type="text">
		<label for="incapacidad">
			Incapacidad médica:
		</label>
	</input>
</div>
</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="grupo" required="">
				<option>
				</option>
				<option value="A">
					A
				</option>
				<option value="B">
					B
				</option>
				<option value="AB">
					AB
				</option>
				<option value="O">
					O
				</option>
			</select>
			<label for="incapacidad">
				Grupo sanguíneo:
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="rh" required="">
				<option>
				</option>
				<option value="+">
					Positivo
				</option>
				<option value="-">
					Negativo
				</option>
			</select>
			<label for="incapacidad">
				RH:
			</label>
		</div>
	</div>
</div>
<h5 class="text-center mt-5">
	<i class="bi bi-bookmark-check"></i> Posesión
</h5>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="fecha_posesion" name="fecha_posesion" placeholder="fecha_posesion"  type="date">
			<label for="fecha_posesion">
				Fecha de posesión:
			</label>
		</input>
	</div>
</div>
<div class="col-md-6">
	<div class="form-floating mb-3">
		<input class="form-control" id="numero_acta_posesion" name="acta_posesion" placeholder="numero_acta_posesion"  type="number">
		<label for="numero_acta_posesion">
			Número acta de posesión:
		</label>
	</input>
</div>
</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="numero_resolucion_posesion" name="resolucion_posesion" placeholder="numero_resolucion_posesion"  type="number">
			<label for="numero_resolucion_posesion">
				Número resolución posesión:
			</label>
		</input>
	</div>
</div>
</div>
<h5 class="text-center mt-5">
	<i class="bi bi-book"></i> Títulos
</h5>
<hr>
</hr>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="pregrado" required="">
				<option value="si">
					Si
				</option>
				<option value="no">
					No
				</option>
			</select>
			<label for="incapacidad">
				Título de pregrado:
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="pregrado" name="nombre_pregrado" placeholder="pregrado"  type="text">
			<label for="pregrado">
				Nombre del título:
			</label>
		</input>
	</div>
</div>
</div>
<hr>
</hr>
<div class="row">
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="posgrado" required="">
				<option value="si">
					Si
				</option>
				<option value="no">
					No
				</option>
			</select>
			<label for="incapacidad">
				Título de posgrado:
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-floating mb-3">
			<input class="form-control" id="posgrado" name="nombre_posgrado" placeholder="prosgrado"  type="text">
			<label for="posgrado">
				Nombre del título:
			</label>
		</input>
	</div>
</div>
</div>
<hr>
</hr>
</div>
<div class="modal-footer">
	<button class="btn btn-danger" data-bs-dismiss="modal" type="button">
		Cancelar
	</button>
	<button class="btn btn-primary" type="submit">
		Registrar
	</button>
</div>
</form>
</div>
</div>
</article>
<!-- fin del modal registrar docente -->
