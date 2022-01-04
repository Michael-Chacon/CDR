            <!-- contenido de  la pagina -->
                <section class="container-fluid">
                    <?php echo Utils::general_alerts('actualizarE', 'La información del estudiante se actualizó con éxito.', 'Algo salió mal al actualizar la información del estudiante.') ?>
                    <?php Utils::borrar_error('actualizarE')?>
                    <!-- inicon de la fila principal -->
                    <section class="row">
                        <article class="col-md-5">
                            <div class="card mb-3">
                                <img alt="..." class="card-img-top" src="<?=base_url?>helpers/img/estudiante.jpg">
                                    <div class="card-body">
                                        <div class="row">
                                            <article class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <article class="flex-shrink-0 contenedor-img-perfil">
                                                    <img alt="..." class="avatar-perfil" src="<?=base_url?>photos/estudiantes/<?=$estudiante->img?>">
                                                    </img>
                                                </article>
                                            </article>
                                            <article class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                <span class="titulo-perfil">
                                                    <?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
                                                </span>
                                                <span class="row">
                                                    <span class="col-10">
                                                        <small class="posicion">
                                                            <?=$estudiante->correo_e?>
                                                        </small>
                                                    </span>
                                                    <span class="col-2">
                                                        <div class="dropdown">
                                                            <a data-bs-toggle="dropdown" href="#" id="opcionesPerfil" role="button">
                                                                <i class="bi bi-chevron-down btn-sm btn-outline-info" style="font-size: 1rem; color: #0d47a1 ;">
                                                                </i>
                                                            </a>
                                                            <ul aria-labelledby="opcionesPerfil" class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item " data-bs-target="#updatePassword" data-bs-toggle="modal" href="#">
                                                                        <i class="bi bi-pen">
                                                                        </i>
                                                                        Cambiar contraseña
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider"/>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#" data-bs-target="#actualizarDatos" data-bs-toggle="modal">
                                                                        <i class="bi bi-arrow-repeat"></i>  Actualizar datos
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider"/>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        Something else here
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </span>
                                                </span>
                                            </article>
                                        </div>
                                        <hr/>
                                        <div class="row text-center">
                                            <article class="col-md-4">
                                                <p>
                                                    <span class="posicion">
                                                        Telefono
                                                    </span>
                                                    <br/>
                                                    <small>
                                                        <?=$estudiante->telefono_e?>
                                                    </small>
                                                </p>
                                            </article>
                                            <article class="col-md-6">
                                                <p>
                                                    <span class="posicion">
                                                        Direccion
                                                    </span>
                                                    <br/>
                                                    <small>
                                                        <?=$estudiante->direccion_e?>
                                                    </small>
                                                </p>
                                            </article>
                                            <article class="col-md-2">
                                                <p>
                                                    <span class="posicion">
                                                        Grado
                                                    </span>
                                                    <br/>
                                                    <small>
                                                        <?=$estudiante->nombre_g?>
                                                    </small>
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                </img>
                            </div>
                        </article>
                        <div class="col-md-7">
                            <div>
                                 <h2>GRAFICA</h2>
                            </div>
                        </div>
                    </section>
                    <section class="row">
                        <!-- inicio de las  opcciones -->
                        <article class="col-md-12 mt-3">
                            <article class="row">
                                <ul class="nav nav-pills mb-3 titulos-pills " id="pills-tab" role="tablist">
                                    <li class="nav-item opciones" role="presentation">
                                        <button aria-controls="pills-home" aria-selected="true" class="nav-link active boton-opciones" data-bs-target="#pills-home" data-bs-toggle="pill" id="pills-home-tab" role="tab" type="button">
                                            Materias
                                        </button>
                                    </li>
                                    <li class="nav-item opciones" role="presentation">
                                        <button aria-controls="pills-profile" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#pills-profile" data-bs-toggle="pill" id="pills-profile-tab" role="tab" type="button">
                                            Horario
                                        </button>
                                    </li>
                                    <li class="nav-item opciones" role="presentation">
                                        <button aria-controls="pills-contact" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#pills-contact" data-bs-toggle="pill" id="pills-contact-tab" role="tab" type="button">
                                            Información
                                        </button>
                                    </li>
                                </ul>
                                <section class="tab-content" id="pills-tabContent">
                                    <article aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                        <!-- inicio materias -->
                                        <section class="row">
                                        <h3 class="text-center mb-2 mt-3 titulo-perfil">
                                            Materias
                                        </h3>
                                        <?php if (isset($datos)):
    while ($materias = $datos->fetchObject()): ?>
	                                                    <article class="col-xs-12 col-sm-6 col-md-4 col-xl-4 mb-2">
	                                                        <div class="card text-center shadow option">
	                                                            <div class="card-body contenido-card materias">
	                                                                <i class="<?=$materias->icono?>" style="font-size: 3rem;">
	                                                                </i>
	                                                                <hr class="hr-perfil"/>
	                                                                <h5 class="mt-2">
	                                                                    <?=$materias->nombre_mat?>
	                                                                </h5>
	                                                                <a class="stretched-link" href="materiaEstudiante.html">
	                                                                </a>
	                                                            </div>
	                                                        </div>
	                                                    </article>
									                <?php endwhile;
endif;?>
                                    </section>
                                        <!-- fin materias -->
                                    </article>
                                    <article aria-labelledby="pills-profile-tab" class="tab-pane fade" id="pills-profile" role="tabpanel">
                                        <!--inicion del horario  -->
                                        <section class="row">
                                        <h3 class="text-center mb-2 mt-3 titulo-perfil">
                                            Horario de clase
                                        </h3>
                                        <article class="col-md-4">
                                            <table class="table shadow text-center table-bordered table-hover table-striped">
                                                <caption class="caption-top text-center">
                                                    Lunes
                                                </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Inicio
                                                        </th>
                                                        <th scope="col">
                                                            Fin
                                                        </th>
                                                        <th scope="col">
                                                            Materia
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($lista_lunes->rowCount() != 0):
    while ($lunes = $lista_lunes->fetchObject()): ?>
	                                                            <tr>
	                                                                <td>
	                                                                    <?=$lunes->inicio?>
	                                                                </td>
	                                                                <td>
	                                                                    <?=$lunes->fin?>
	                                                                </td>
	                                                                <td>
	                                                                    <?=$lunes->nombre_mat?>
	                                                                </td>
	                                                            </tr>
	                                                        <?php endwhile;
else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
                                                <?php endif;?>
                                                </tbody>
                                            </table>
                                        </article>
                                        <article class="col-md-4">
                                            <table class="table shadow text-center table-bordered table-hover table-striped">
                                                <caption class="caption-top text-center">
                                                    Martes
                                                </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Inicio
                                                        </th>
                                                        <th scope="col">
                                                            Fin
                                                        </th>
                                                        <th scope="col">
                                                            Materia
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php if ($lista_martes->rowCount() != 0):
    while ($martes = $lista_martes->fetchObject()): ?>
	                                                                <tr>
	                                                                    <td>
	                                                                        <?=$martes->inicio?>
	                                                                    </td>
	                                                                    <td>
	                                                                        <?=$martes->fin?>
	                                                                    </td>
	                                                                    <td>
	                                                                        <?=$martes->nombre_mat?>
	                                                                                                                                </td>
	                                                                </tr>
									                            <?php endwhile;
else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
                                                <?php endif;?>
                                                </tbody>
                                            </table>
                                        </article>
                                        <article class="col-md-4">
                                            <table class="table shadow text-center table-bordered table-hover table-striped">
                                                <caption class="caption-top text-center">
                                                    Miércoles
                                                </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Inicio
                                                        </th>
                                                        <th scope="col">
                                                            Fin
                                                        </th>
                                                        <th scope="col">
                                                            Materia
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php if ($lista_miercoles->rowCount() != 0):
    while ($miercoles = $lista_miercoles->fetchObject()): ?>
									                                                    <tr>
									                                                        <td>
									                                                            <?=$miercoles->inicio?>
									                                                        </td>
									                                                        <td>
									                                                            <?=$miercoles->fin?>
									                                                        </td>
									                                                        <td>
									                                                            <?=$miercoles->nombre_mat?>
									                                                        </td>
									                                                    </tr>
									                                <?php endwhile;
else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
                                                <?php endif;?>
                                                </tbody>
                                            </table>
                                        </article>
                                        <article class="col-md-4">
                                            <table class="table shadow text-center table-bordered table-hover table-striped">
                                                <caption class="caption-top text-center">
                                                    Jueves
                                                </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Inicio
                                                        </th>
                                                        <th scope="col">
                                                            Fin
                                                        </th>
                                                        <th scope="col">
                                                            Materia
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($lista_jueves->rowCount() != 0):
    while ($jueves = $lista_jueves->fetchObject()): ?>
									                                                    <tr>
									                                                        <td>
									                                                            <?=$jueves->inicio?>
									                                                        </td>
									                                                        <td>
									                                                            <?=$jueves->fin?>
									                                                        </td>
									                                                        <td>
									                                                            <?=$jueves->nombre_mat?>
									                                                        </td>
									                                                    </tr>
									                                <?php endwhile;
else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
                                                <?php endif;?>
                                                </tbody>
                                            </table>
                                        </article>
                                        <article class="col-md-4">
                                            <table class="table shadow text-center table-bordered table-hover table-striped">
                                                <caption class="caption-top text-center">
                                                    Viernes
                                                </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Inicio
                                                        </th>
                                                        <th scope="col">
                                                            Fin
                                                        </th>
                                                        <th scope="col">
                                                            Materia
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($lista_viernes->rowCount() != 0):
    while ($viernes = $lista_viernes->fetchObject()): ?>
									                                    <tr>
									                                        <td>
									                                            <?=$viernes->inicio?>
									                                        </td>
									                                        <td>
									                                            <?=$viernes->fin?>
									                                        </td>
									                                        <td>
									                                                <?=$viernes->nombre_mat?>
									                                        </td>
									                                    </tr>
									                            <?php endwhile;
else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
                                                <?php endif;?>
                                                </tbody>
                                            </table>
                                        </article>
                                    </section>
                                        <!-- fin del horario -->
                                    </article>
                                    <div aria-labelledby="pills-contact-tab" class="tab-pane fade" id="pills-contact" role="tabpanel">
                                        <!-- inicio informacion del estdiante -->
                                        <div class="modal-body">
                                            <h2 class="text-center titulo-perfil">
                                                Información estudiante
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="nombre" name="nombres" placeholder="Nombre" required="" type="text" value="<?=$estudiante->nombre_e?>">
                                                            <label for="nombre">
                                                                Nombres:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="apellidos" name="apellidos" placeholder="Apellidos"  type="text" value="<?=$estudiante->apellidos_e?>">
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
                                                        <input class="form-control" id="nacimienito" name="nacimienito" disabled placeholder="nacimienito"  type="text" value="<?=$estudiante->fecha_nacimiento_e?>">
                                                            <label for="nacimienito">
                                                                Fecha de nacimiento:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="edad" name="edad" placeholder="edad" required="" type="number" value="<?=$estudiante->edad_e?>">
                                                            <label for="edad">
                                                                Edad:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="text-center mt-3">
                                                Identificación
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                       <input class="form-control" disabled="" id="tipo" name="tipo" placeholder="tipo" required="" type="text" value="<?=$estudiante->tipo_identificacion_e?>">
                                                        <label for="incapacidad">
                                                            Tipo:
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="numero" name="numero" placeholder="Numero" required="" type="number" value="<?=$estudiante->numero_e?>">
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
                                                        <input class="form-control" disabled="" id="expedicion" name="expedicion" placeholder="expedicion" required="" type="text" value="<?=$estudiante->lugar_expedicion_e?>">
                                                            <label for="expedicion">
                                                                Lugar de expedición:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled id="fecha" name="fecha" placeholder="fecha" required="" type="text" value="<?=$estudiante->fecha_expedicion_e?>">
                                                            <label for="fecha">
                                                                Fecha de expedición:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="text-center mt-3">
                                                Ubicación
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="direccion" name="direccion" placeholder="direccion" required="" type="text" value="<?=$estudiante->direccion_e?>">
                                                            <label for="direccion">
                                                                Dirección:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="telefono" name="telefono" placeholder="telefono" required="" type="number" value="<?=$estudiante->telefono_e?>">
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
                                                        <input class="form-control" disabled="" id="correo" name="correo" placeholder="correo" required="" type="email" value="<?=$estudiante->correo_e?>">
                                                            <label for="correo">
                                                                Correo electrónico:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="text-center mt-3">
                                                Otros
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="religion" name="religion" placeholder="religion" required="" type="text" value="<?=$estudiante->religion_e?>">
                                                            <label for="religion">
                                                                Religión:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="incapacidad" name="incapacidad" placeholder="incapacidad" required="" type="text" value="<?=$estudiante->incapacidad_medica_e?>">
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
                                                    	 <input class="form-control" disabled="" id="grupo" name="grupo" placeholder="grupo" required="" type="text" value="<?=$estudiante->grupo_sanguineo_e?>">
                                                        <label for="grupo">
                                                            Grupo sanguíneo:
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="rh" name="rh" placeholder="rh" required="" type="text" value="<?=$estudiante->rh_e?>">
                                                        <label for="rh">
                                                            RH:
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="trasporte" name="trasporte" placeholder="trasporte" required="" type="text" value="<?=$estudiante->transporte?>">
                                                        <label for="trasporte">
                                                            Trasporte:
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                       <input class="form-control" disabled="" id="pae" name="pae" placeholder="pae" required="" type="text" value="<?=$estudiante->pae?>">
                                                        <label for="pae">
                                                            PAE:
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- mamá -->
                                            <h2 class="titulo-perfil text-center">
                                                Informacion de la mamá
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="nombre" name="nombresmama" placeholder="Nombre" required="" type="text" value="<?=$estudiante->nombre_m?>">
                                                            <label for="nombre">
                                                                Nombres:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="apellidos" name="apellidosmama" placeholder="Apellidos" required="" type="text" value="<?=$estudiante->apellidos_m?>">
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
                                                        <input class="form-control" disabled id="nacimienito" name="nacimienitomama" placeholder="nacimienito" required="" type="text" value="<?=$estudiante->fecha_nacimiento_m?>">
                                                            <label for="nacimienito">
                                                                Fecha de nacimiento:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="edad" name="edadmama" placeholder="edad" required="" type="number" value="<?=$estudiante->edad_m?>">
                                                            <label for="edad">
                                                                Edad:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                         <input class="form-control" disabled="" id="tipo" name="tipo_m" placeholder="tipo" required="" type="number" value="<?=$estudiante->tipo_identificacion_m?>">
                                                            <label for="incapacidad">
                                                                Tipo:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="numero" name="numeromama" placeholder="Numero" required="" type="number" value="<?=$estudiante->numero_m?>">
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
                                                        <input class="form-control" disabled="" id="expedicion" name="expedicionmama" placeholder="expedicion" required="" type="text" value="<?=$estudiante->lugar_expedicion_m?>">
                                                            <label for="expedicion">
                                                                Lugar de expedición:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="fecha" name="fechamama" placeholder="fecha" required="" disabled type="text" value="<?=$estudiante->fecha_expedicion_m?>">
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
                                                        <input class="form-control" disabled="" id="ocupacion" name="ocupacionmama" placeholder="ocupacion" required="" type="text" value="<?=$estudiante->ocupacion_m?>">
                                                            <label for="ocupacion">
                                                                Ocupación
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="telefono" name="telefonomama" placeholder="telefono" required="" type="number" value="<?=$estudiante->telefono_m?>">
                                                            <label for="telefono">
                                                                Número de celular:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- papá -->
                                            <h2 class="titulo-perfil text-center">
                                                Informacion del papá
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="nombre" name="nombrespapa" placeholder="Nombre" required="" type="text" value="<?=$estudiante->nombre_p?>">
                                                            <label for="nombre">
                                                                Nombres:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="apellidos" name="apellidospapa" placeholder="Apellidos" required="" type="text" value="<?=$estudiante->apellidos_p?>">
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
                                                        <input class="form-control" id="nacimienito" name="nacimienitopapa" placeholder="nacimienito" required="" disabled type="text" value="<?=$estudiante->fecha_nacimiento_m?>">
                                                            <label for="nacimienito">
                                                                Fecha de nacimiento:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="edad" name="edadpapa" placeholder="edad" required="" type="number" value="<?=$estudiante->edad_p?>">
                                                            <label for="edad">
                                                                Edad:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="edad" name="tipo_pa" placeholder="edad" required="" type="number" value="<?=$estudiante->tipo_identificacion_p?>">
                                                        <label for="incapacidad">
                                                            Tipo:
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="numero" name="numeropapa" placeholder="Numero" required="" type="number" value="<?=$estudiante->numero_p?>">
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
                                                        <input class="form-control" disabled="" id="expedicion" name="expedicionpapa" placeholder="expedicion" required="" type="text" value="<?=$estudiante->lugar_expedicion_p?>">
                                                            <label for="expedicion">
                                                                Lugar de expedición:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="fecha" name="fechapapa" placeholder="fecha" required="" disabled type="text" value="<?=$estudiante->fecha_expedicion_p?>">
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
                                                        <input class="form-control" disabled="" id="ocupacion" name="ocupacionpapa" placeholder="ocupacion" required="" type="text" value="<?=$estudiante->ocupacion_p?>">
                                                            <label for="ocupacion">
                                                                Ocupación
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="telefono" name="telefonopapa" placeholder="telefono" required="" type="number" value="<?=$estudiante->telefono_p?>">
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
                                                        <input class="form-control" disabled="" id="direccion" name="direccionpapa" placeholder="direccion" required="" type="text" value="<?=$estudiante->direccion?>">
                                                            <label for="direccion">
                                                                Dirección
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" disabled="" id="correo" name="correo" placeholder="correo" required="" type="text" value="<?=$estudiante->correo?>">
                                                            <label for="correo">
                                                                Correo:
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fin informacion del  estudiante -->
                                    </div>
                                </section>
                            </article>
                        </article>
                    </section>
                </section>
            </section>
        </main>
        <!-- fin de la fila principal -->
        <!-- ================================================
    ================MODALES=========================
    ================================================= -->
        <!-- Modal  de camabio de contraseña-->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="updatePassword" tabindex="-1">
            <section class="modal-dialog">
                <article class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Cambiar contraseña
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="new_pass" required="" type="text"/>
                                <label for="new_pass">
                                    Contraseña nueva:
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                                Cancelar
                            </button>
                            <button class="btn btn-primary" type="button">
                                Guardar
                            </button>
                        </div>
                    </form>
                </article>
            </section>
        </section>
              <!--  modal para actualizar datos -->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="actualizarDatos" tabindex="-1">
            <section class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Modal title
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" enctype="multipart/form-data">
                        </button>
                    </div>
                   <form action="<?=base_url?>Estudiante/registrarEstudiante" method="post" enctype="multipart/form-data">
                    <input type="text" hidden name="x" value="<?=$estudiantePadres->estudiante_id?>">
                    <input type="text" hidden name="y" value="<?=$estudiantePadres->padres?>">
                    <input type="text" hidden name="z" value="<?=$estudiantePadres->id_gradoE?>">
                                <div class="modal-body">
                                    <h5 class="text-center mt-2">
                                        Estudiante
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nombre" name="nombres" placeholder="Nombre" required="" type="text" value="<?=$estudiantePadres->nombre_e?>">
                                                    <label for="nombre">
                                                        Nombres:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required="" type="text" value="<?=$estudiantePadres->apellidos_e?>">
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
                                                <input class="form-control" id="nacimienito" name="nacimienito" placeholder="nacimienito" required="" type="date" value="<?=$estudiantePadres->fecha_nacimiento_e?>">
                                                    <label for="nacimienito">
                                                        Fecha de nacimiento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad" name="edad" placeholder="edad" required="" type="number" value="<?=$estudiantePadres->edad_e?>">
                                                    <label for="edad">
                                                        Edad:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- aca va el select del grado -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3">
                                                <input class="form-control" id="genero" name="genero" placeholder="genero" required="" type="text" value="<?=$estudiantePadres->sexo_e?>">
                                                    <label for="genero">
                                                        Genero:
                                                    </label>
                                                </input>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-fingerprint"></i> Identificación
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="tipo-estudiante" name="tipo_e" placeholder="tipo-estudiante" required="" type="text" value="<?=$estudiantePadres->tipo_identificacion_e?>">
                                                <label for="tipo-estudiante">
                                                    Tipo:
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numero" name="numero" placeholder="Numero" required="" type="number" value="<?=$estudiantePadres->numero_e?>">
                                                    <label for="numero">
                                                        Número de identificación:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="expedicion" name="expedicion" placeholder="expedicion" required="" type="text" value="<?=$estudiantePadres->lugar_expedicion_e?>">
                                                    <label for="expedicion">
                                                        Lugar de expedición:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fecha" name="fecha" placeholder="fecha" required="" type="date" value="<?=$estudiantePadres->fecha_expedicion_e?>">
                                                    <label for="fecha">
                                                        Fecha de expedición:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-geo-alt"></i> Ubicación
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="direccion" name="direccion" placeholder="direccion" required="" type="text" value="<?=$estudiantePadres->direccion_e?>">
                                                    <label for="direccion">
                                                        Dirección de tu casa:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefono" name="telefono" placeholder="telefono" required="" type="number" value="<?=$estudiantePadres->telefono_e?>">
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
                                                <input class="form-control" id="correo" name="correo" placeholder="correo"  type="email" value="<?=$estudiantePadres->correo_e?>">
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
                                                <input class="form-control" id="religion" name="religion" placeholder="religion"  type="text" value="<?=$estudiantePadres->religion_e?>">
                                                    <label for="religion">
                                                        Religión:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="incapacidad" name="incapacidad" placeholder="incapacidad" required="" type="text" value="<?=$estudiantePadres->incapacidad_medica_e?>">
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
                                                    <input class="form-control" id="grupo" name="grupo" placeholder="grupo" required="" type="text" value="<?=$estudiantePadres->grupo_sanguineo_e?>">
                                                    <label for="grupo">
                                                      Grupo sanguíneo:
                                                    </label>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="rh" name="rh" placeholder="rh" required="" type="text" value="<?=$estudiantePadres->rh_e?>">
                                                    <label for="rh">
                                                      RH:
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="transporte" name="trasporte" placeholder="transporte" required="" type="text" value="<?=$estudiantePadres->transporte?>">
                                                    <label for="transporte">
                                                      Transporte:
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="pae" name="pae" placeholder="pae" required="" type="text" value="<?=$estudiantePadres->pae?>">
                                                    <label for="pae">
                                                      PAE:
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                          <label for="formFileLg" class="form-label">Foto del estudiante:</label>
                                          <input class="form-control" id="formFileLg" type="file" name="foto">
                                        </div>
                                    </div> 
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-people"></i> Información de la madre
                                    </h5>
                                    <input type="text" name="padres" value="<?=$estudiantePadres->padres?>" hidden>
                                    <input type="text" name="estudiante_id" value="<?=$estudiantePadres->estudiante_id?>" hidden>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nombre_m" name="nombres_m" placeholder="Nombre"  type="text" value="<?=$estudiantePadres->nombre_m?>">
                                                    <label for="nombre_m">
                                                        Nombres:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="apellidos_m" name="apellidos_m" placeholder="Apellidos"  type="text" value="<?=$estudiantePadres->apellidos_m?>">
                                                    <label for="apellidos_m">
                                                        Apellidos:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nacimiento_m" name="nacimiento_m" placeholder="Fecha nacimiento"  type="date" value="<?=$estudiantePadres->fecha_nacimiento_m?>">
                                                    <label for="nacimiento_m">
                                                        Fecha de nacimiento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad_m" name="edad_m" placeholder="Edad"  type="number" value="<?=$estudiantePadres->edad_m?>">
                                                    <label for="edad_m">
                                                        Edad:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="tipo_m" name="tipo_m" placeholder="tipo_m"  type="text" value="<?=$estudiantePadres->tipo_identificacion_m?>">
                                                    <label for="tipo_m">
                                                      Tipo:
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numero_m" name="numero_m" placeholder="Número"  type="number" value="<?=$estudiantePadres->numero_m?>">
                                                    <label for="numero_m">
                                                        Número identificación:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="lugar_expedicion_m" name="lugar_expedicion_m" placeholder="Lugar"  type="text" value="<?=$estudiantePadres->lugar_expedicion_m?>">
                                                    <label for="lugar_expedicion_m">
                                                        Lugar de expedición del documento :
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fecha_expedicion_m" name="fecha_expedicion_m" placeholder="Fecha de expedicion"  type="date" value="<?=$estudiantePadres->fecha_expedicion_m?>">
                                                    <label for="fecha_expedicion_m">
                                                        Fecha de expedición del documento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefono_m" name="telefono_m" placeholder="Telefono"  type="number" value="<?=$estudiantePadres->telefono_m?>">
                                                    <label for="telefono_m">
                                                        Telefono:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="ocupacion_m" name="ocupacion_m" placeholder="Ocupación"  type="text" value="<?=$estudiantePadres->ocupacion_m?>">
                                                    <label for="ocupacion_m">
                                                        Ocupación:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-people"></i> Información del padre
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nombre_pa" name="nombres_pa" placeholder="Nombre"  type="text" value="<?=$estudiantePadres->nombre_p?>">
                                                    <label for="nombre_pa">
                                                        Nombres:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="apellidos_pa" name="apellidos_pa" placeholder="Apellidos"  type="text" value="<?=$estudiantePadres->apellidos_p?>">
                                                    <label for="apellidos_pa">
                                                        Apellidos:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nacimiento_pa" name="nacimiento_pa" placeholder="Fecha nacimiento"  type="date" value="<?=$estudiantePadres->fecha_nacimiento_p?>">
                                                    <label for="nacimiento_pa">
                                                        Fecha de nacimiento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad_pa" name="edad_pa" placeholder="Edad"  type="number" value="<?=$estudiantePadres->edad_p?>">
                                                    <label for="edad_pa">
                                                        Edad:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="tipo_pa" name="tipo_pa" placeholder="tipo_pa"  type="text" value="<?=$estudiantePadres->tipo_identificacion_p?>">
                                                    <label for="tipo_pa">
                                                      Tipo:
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numero_pa" name="numero_pa" placeholder="Número"  type="number" value="<?=$estudiantePadres->numero_p?>">
                                                    <label for="numero_pa">
                                                        Número identificación:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="lugar_expedicion_pa" name="lugar_expedicion_pa" placeholder="Lugar"  type="text" value="<?=$estudiantePadres->lugar_expedicion_p?>">
                                                    <label for="lugar_expedicion_pa">
                                                        Lugar de expedición del documento :
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fecha_expedicion_pa" name="fecha_expedicion_pa" placeholder="Fecha expedicion"  type="date" value="<?=$estudiantePadres->fecha_expedicion_p?>">
                                                    <label for="fecha_expedicion_pa">
                                                        Fecha de expedición del documento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefono_pa" name="telefono_pa" placeholder="Telefono"  type="number" value="<?=$estudiantePadres->telefono_p?>">
                                                    <label for="telefono_pa">
                                                        Telefono:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="ocupacion_pa" name="ocupacion_pa" placeholder="Ocupación"  type="text" value="<?=$estudiantePadres->ocupacion_p?>">
                                                    <label for="ocupacion_pa">
                                                        Ocupación:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-info"></i> Otros datos de madre y padre
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="direccion_mp" name="direccion_mp" placeholder="Dirección" required="" type="text" value="<?=$estudiantePadres->direccion?>">
                                                    <label for="direccion_mp">
                                                        Dirección:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="correo_mp" name="correo_mp" placeholder="Correo"  type="text" value="<?=$estudiantePadres->correo?>">
                                                    <label for="correo_mp">
                                                        Correo electronico:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
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
            </section>
        </section>
        <!-- fin del modal -->
        <!-- ================================================
    =================FIN MODALES====================
    ================================================= -->