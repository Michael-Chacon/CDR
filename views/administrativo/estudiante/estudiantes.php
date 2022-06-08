  <!-- contenido de  la pagina -->
                <section class="container-fluid">
                    <section class="row shadow titulo">
                        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            <h1 class="text-center config">
                                Registro de estudiantes
                            </h1>
                        </article>
                        <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                            <a data-bs-target="#createEstudiante" data-bs-toggle="modal"  type="button">
                                <i class="bi bi-person-plus efecto_hover" style="font-size: 2rem; color: white;">
                                </i>
                            </a>
                        </article>
                    </section>
                    <?php echo Utils::getAlert(); ?>
                    <?php Utils::borrar_error('alert');?>
                    <section class="row justify-content-center mt-3 mb-5">
                        <article class="col-md-6 justify-content-end mb-4 ">
                             <form class="d-flex ">
                                <input class="form-control me-2" type="search" placeholder="Buscar estudiante " aria-label="Search" autofocus>
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                            <article id="emailHelp" class="form-text">Puedes buscar por nombres o por número de documento.</article>
                        </article>
                        <section class="col-md-10">
                            <?php if (isset($todos_estudiantes) && $todos_estudiantes->rowCount() != 0):?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th scope="col">
                                                #
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
                                                Documento
                                            </th>
                                            <th scope="col">
                                                Grado
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $c = 1;
                                        while ($estudiantes = $todos_estudiantes->fetchObject()): ?>
                                          <tr>
                                            <th class="texto_tabla_docente text-center" scope="row">
                                                <?=$c++?>
                                            </th>
                                            <td>
                                                <?php if ($estudiantes->img == null): ?>
                                                    <img alt="" class="avatar-tabla circulo" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                                                <?php else: ?>
                                                 <img alt="" class="avatar-tabla circulo" src="<?=base_url?>photos/estudiantes/<?=$estudiantes->img?>"></img>
                                             <?php endif;?>
                                         </td>
                                         <td class="texto_tabla_docente">
                                          <a href="<?=base_url?>Estudiante/perfilEstudiante&x=<?=$estudiantes->id?>&y=<?=$estudiantes->id_familia_e?>&z=<?=$estudiantes->id_grado?>">
                                            <?=$estudiantes->nombre_e?>
                                            <?=$estudiantes->apellidos_e?>
                                        </a>
                                    </td>
                                    <td class="texto_tabla_docente text-center">
                                      <?=$estudiantes->correo_e?>
                                  </td>
                                  <td class="texto_tabla_docente text-center">
                                      <?=$estudiantes->numero_e?>
                                  </td>
                                  <td class="text-center">
                                      <a href="<?=base_url?>Materias/vista&id_grado=<?=Utils::encryption($estudiantes->id_gradoE)?>">
                                          <h3>
                                              <?=$estudiantes->nombre_g?>
                                          </h3>
                                      </a>
                                  </td>
                              </tr>
                          <?php endwhile;?>
                </tbody>
            </table>
                      <?php else: ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Aún no hay estudiantes registrados.
                        </div>
                    <?php endif;?>
                            </div>
                        </section>
                    </section>
                    <!-- fin del container etiquita de abajo-->
                </section>
                <!-- inicio modal -->
                <article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="createEstudiante" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Registrar estudiante
                                </h5>
                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                </button>
                            </div>
                            <form action="<?=base_url?>Estudiante/registrarEstudiante" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <h5 class="text-center mt-2">
                                        Estudiante
                                    </h5>
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
                                                <input class="form-control" id="nacimienito" name="nacimienito" placeholder="nacimienito" required="" type="date">
                                                    <label for="nacimienito">
                                                        Fecha de nacimiento:
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="grado" required="">
                                                <?php if (isset($todos)):
                                                            while ($grado = $todos->fetchObject()): ?>
		                                                                <option value="<?=$grado->id?>"><?=$grado->nombre_g?></option>
				                                              <?php endwhile;
                                                endif;?>
                                                </select>
                                                <label for="incapacidad">
                                                    ¿A qué grado ingresas?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="genero" required="">
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
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo_e" required="">
                                                    <option value="cedula">
                                                        Cédula
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
                                                        Número de identificación:
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
                                                        Dirección de tu casa:
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
                                                <input class="form-control" id="correo" name="correo" placeholder="correo"  type="email">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="trasporte" required="">
                                                    <option>
                                                    </option>
                                                    <option value="si">
                                                        Si
                                                    </option>
                                                    <option value="no">
                                                        No
                                                    </option>
                                                </select>
                                                <label for="trasporte">
                                                    Trasporte:
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="pae" required="">
                                                    <option>
                                                    </option>
                                                    <option value="si">
                                                        Si
                                                    </option>
                                                    <option value="no">
                                                        No
                                                    </option>
                                                </select>
                                                <label for="trasporte">
                                                    PAE:
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                 <h5 class="text-center mt-3 mb-3">
                                        Padres
                                    </h5>
                                    <hr/>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" id="si" name="existePadres" type="radio" value="si">
                                                    <label class="form-check-label" for="si">
                                                        Los padres YA estan registrados
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="floatingInput" type="number" name="siExistePadre">
                                                    <label for="floatingInput">
                                                        Número de cédula del padre o de la madre
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                        <hr/>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" id="no" name="existePadres" type="radio" value="no">
                                                    <label class="form-check-label" for="no">
                                                        Los padres aun NO estan registrados
                                                    </label>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <!-- inico del acordeon -->
                                    <div class="accordion accordion-flush mt-5 bg-dark" id="padresDeFamilia">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button aria-controls="flush-collapseOne" aria-expanded="false" class="accordion-button collapsed boton-acordeon shadow" data-bs-target="#flush-collapseOne" data-bs-toggle="collapse" type="button">
                                                    llenar la Información de los padres
                                                </button>
                                            </h2>
                                            <div aria-labelledby="flush-headingOne" class="accordion-collapse collapse" data-bs-parent="#padresDeFamilia" id="flush-collapseOne">
                                                <div class="accordion-body">
                                                    <h5 class="text-center mt-5">
                                                        Información de la madre
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="nombre_m" name="nombres_m" placeholder="Nombre"  type="text">
                                                                    <label for="nombre_m">
                                                                        Nombres:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="apellidos_m" name="apellidos_m" placeholder="Apellidos"  type="text">
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
                                                                <input class="form-control" id="nacimiento_m" name="nacimiento_m" placeholder="Fecha nacimiento"  type="date">
                                                                    <label for="nacimiento_m">
                                                                        Fecha de nacimiento:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo_m" >
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
                                                                <input class="form-control" id="numero_m" name="numero_m" placeholder="Número"  type="number">
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
                                                                <input class="form-control" id="lugar_expedicion_m" name="lugar_expedicion_m" placeholder="Lugar"  type="text">
                                                                    <label for="lugar_expedicion_m">
                                                                        Lugar de expedición del documento :
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="fecha_expedicion_m" name="fecha_expedicion_m" placeholder="Fecha de expedicion"  type="date">
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
                                                                <input class="form-control" id="telefono_m" name="telefono_m" placeholder="Telefono"  type="number">
                                                                    <label for="telefono_m">
                                                                        Telefono:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="ocupacion_m" name="ocupacion_m" placeholder="Ocupación"  type="text">
                                                                    <label for="ocupacion_m">
                                                                        Ocupación:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="text-center mt-5">
                                                        Información del padre
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="nombre_pa" name="nombres_pa" placeholder="Nombre"  type="text">
                                                                    <label for="nombre_pa">
                                                                        Nombres:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="apellidos_pa" name="apellidos_pa" placeholder="Apellidos"  type="text">
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
                                                                <input class="form-control" id="nacimiento_pa" name="nacimiento_pa" placeholder="Fecha nacimiento"  type="date">
                                                                    <label for="nacimiento_pa">
                                                                        Fecha de nacimiento:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo_pa" >
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
                                                                <input class="form-control" id="numero_pa" name="numero_pa" placeholder="Número"  type="number">
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
                                                                <input class="form-control" id="lugar_expedicion_pa" name="lugar_expedicion_pa" placeholder="Lugar"  type="text">
                                                                    <label for="lugar_expedicion_pa">
                                                                        Lugar de expedición del documento :
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="fecha_expedicion_pa" name="fecha_expedicion_pa" placeholder="Fecha expedicion"  type="date">
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
                                                                <input class="form-control" id="telefono_pa" name="telefono_pa" placeholder="Telefono"  type="number">
                                                                    <label for="telefono_pa">
                                                                        Telefono:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="ocupacion_pa" name="ocupacion_pa" placeholder="Ocupación"  type="text">
                                                                    <label for="ocupacion_pa">
                                                                        Ocupación:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="text-center mt-5">
                                                        Otros datos de madre y padre
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="direccion_mp" name="direccion_mp" placeholder="Dirección"  type="text">
                                                                    <label for="direccion_mp">
                                                                        Dirección:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="correo_mp" name="correo_mp" placeholder="Correo"  type="text">
                                                                    <label for="correo_mp">
                                                                        Correo electronico:
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin del acordeon -->
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
                <!-- fin del modal -->
