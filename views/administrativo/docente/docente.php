
                    <div class="container-fluid">
                        <section class="row shadow titulo">
                        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            <h1 class="text-center config">
                                Docentes
                            </h1>
                        </article>
                        <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                            <a data-bs-target="#crearDocente" data-bs-toggle="modal" type="button">
                                <i class="bi bi-person-plus efecto_hover" style="font-size: 2rem; color: white;">
                                </i>
                            </a>
                        </article>
                    </section>
                    </div>
                     <?php echo Utils::general_alerts('docente', 'El docente se ha registrado con éxito.', 'Algo salió mal al registrar el docente, inténtelo de nuevo.'); ?>
                     <?php echo Utils::general_alerts('credencial_d', 'Se asignaron credenciales al docente con éxito.', 'Algo salió mal al asignar credencale al docente, inténtelo de nuevo.'); ?>
                     <?php echo Utils::general_alerts('validacion_d', '', 'Se encontró un docente en la base de datos con el mismo número de documento, posiblemente este docente ya existe en la plataforma.') ?>
                     <?php Utils::borrar_error('docente');
                        Utils::borrar_error('credencial_d');
                        Utils::borrar_error('validacion_d');
                        ?>
                    <!-- tabla -->
                    <section class="row justify-content-center mt-5">
                        <div class="col-md-10 shadow">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">
                                            Id
                                        </th>
                                           <th  scope="col">
                                                Foto
                                        </th>
                                        <th scope="col">
                                            Nombres
                                        </th>
                                        <th scope="col">
                                            Correo
                                        </th>
                                        <th scope="col">
                                            Telefono
                                        </th>
                                        <th scope="col">
                                            Documento
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($lista)):
    while ($docente_datos = $lista->fetchObject()): ?>
		                                                <tr>
		                                                    <th class="" scope="row">
		                                                        <?=$docente_datos->id?>
		                                                    </th>
		                                                    <td>
		                                                        <img alt="" class="avatar-tabla circulo" src="<?=base_url?>helpers/img/obito.png"></img>
		                                                    </td>
		                                                    <td class="texto_tabla_docente">
		                                                        <a href=" <?=$docente_datos->id?>">
		                                                              <?=$docente_datos->nombre_d?>
		                                                               <?=$docente_datos->apellidos_d?>
		                                                            <br/>
		                                                        </a>
		                                                        <small><?=$docente_datos->nombre_pregrado_d?></small>
		                                                    </td>
		                                                    <td class="texto_tabla_docente">
		                                                        <?=$docente_datos->correo_d?>
		                                                    </td>
		                                                    <td class="texto_tabla_docente">
		                                                        <?=$docente_datos->telefono_d?>
		                                                    </td>
		                                                    <td class="texto_tabla_docente">
		                                                        <?=$docente_datos->numero_d?>
		                                                    </td>
		                                                </tr>
		                                <?php endwhile;
endif;
?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!-- fin de la tabla -->
                    <!-- fin del container en la etiqueta de abajo -->
                </section>

                <!-- inicio del modal Registrar docente -->
                <article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="crearDocente" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Registrar docente
                                </h5>
                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                </button>
                            </div>
                            <h5 class="text-center mt-4">Docente</h5>
                            <form action="<?=base_url?>Docente/registrarDocente" method="post">
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
                                                <input class="form-control" id="nacimienito" name="nacimiento" placeholder="nacimienito" required="" type="date">
                                                    <label for="nacimienito">
                                                        Fecha de nacimiento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad" name="edad" placeholder="edad" required="" type="number">
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
                                                        Número resolución de posesión:
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
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="posgrado" >
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
                                    <hr/>
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
