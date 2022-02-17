<!-- contenido de  la pagina -->
                <section class="container-fluid">
                    <?php echo Utils::general_alerts('actualizarD', 'La información del docente fue actualizada con éxito.', 'Algo salió mal al actualizar la información, inténtelo de nuevo.'); ?>
                    <?php echo Utils::general_alerts('actualizarPD', 'La ontraseña del docente fue actualizada con éxito.', 'Algo salió mal al actualizar la contraseña, inténtelo de nuevo.') ?>
                    <?php Utils::borrar_error('actualizarD');
                            Utils::borrar_error('actualizarPD');
                     ?>
                    <!-- inicon de la fila principal -->
                    <section class="row">
                        <article class="col-md-5">
                            <div class="card mb-3">
                                <img alt="..." class="card-img-top" src="<?=base_url?>helpers/img/docente.jpg">
                                    <div class="card-body">
                                        <div class="row">
                                            <article class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <article class="flex-shrink-0 contenedor-img-perfil">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#fotoPerfil">
                                                        <?php if ($docente->img == null): ?>
                                                            <img alt="" class="avatar-perfil" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                                                        <?php else: ?>
                                                            <img alt="" class="avatar-perfil" src="<?=base_url?>photos/docentes/<?=$docente->img?>"></img>
                                                        <?php endif;?>
                                                    </a>
                                                </article>
                                            </article>
                                            <article class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                <span class="titulo-perfil-perfil">
                                                    <?=$docente->nombre_d?>
                                                    <?=$docente->apellidos_d?>
                                                </span>
                                                <span class="row">
                                                    <span class="col-10">
                                                        <small class="posicion">
                                                           <?=$docente->correo_d?>
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
                                                                        <i class="bi bi-key"></i>
                                                                        Cambiar contraseña
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider"/>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" data-bs-target="#actualizarDatos" data-bs-toggle="modal" href="#">
                                                                        <i class="bi bi-pen"></i>
                                                                        Actualizar datos
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
                                            <article class="col-md-6">
                                                <p>
                                                    <span class="posicion">
                                                        Telefono
                                                    </span>
                                                    <br/>
                                                    <span class="item_perfil">
                                                        <?=$docente->telefono_d?>
                                                    </span>
                                                </p>
                                            </article>
                                            <article class="col-md-6">
                                                <p>
                                                    <span class="posicion">
                                                        Direccion
                                                    </span>
                                                    <br/>
                                                    <span class="item_perfil">
                                                        <?=$docente->direccion_d?>
                                                    </span>
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                </img>
                            </div>
                        </article>
                        <div class="col-md-7">
                            <div>
                                <h2>
                                    Grafica
                                </h2>
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
                                            Grados
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
                                    <section aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                        <!-- inicio grados -->
                                        <section class="row">
                                            <?php if($lista_grados->rowCount() != 0): ?>
                                                <?php while($grado = $lista_grados->fetchObject()): ?>
                                                    <article class="col-xs-12 col-sm-6 col-md-3 col-xl-3 mb-2">
                                                        <article class="card text-center shadow option">
                                                            <div class="card-body contenido-card">
                                                                <h2 class="mt-2 grados">
                                                                    <?=$grado->nombre_g?>°
                                                                </h2>
                                                                <hr class="hr-perfil"/>
                                                                <a class="stretched-link" href="<?=$grado->id?>">
                                                                </a>
                                                            </div>
                                                        </article>
                                                    </article>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                 <p class="text-center mt-2"><span class="badge bg-warning text-dark">No hay grados asignadas</span></p>
                                            <?php endif; ?>
                                        </section>
                                        <!-- fin materias -->
                                    </section>
                                    <section aria-labelledby="pills-profile-tab" class="tab-pane fade" id="pills-profile" role="tabpanel">
                                        <!--inicion del horario  -->
                                        <section class="row">
                                            <article class="col-md-4 text-center">
                                                <span class="dia">
                                                    Lunes
                                                </span>
                                                <?php if($dia_lunes->rowCount() > 0): ?>
                                                    <div>
                                                <table class="table shadow text-center table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                Inicio
                                                            </th>
                                                            <th>
                                                                Fin
                                                            </th>
                                                            <th scope="col">
                                                                Materia
                                                            </th>
                                                            <th>
                                                                Grado
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($lunes = $dia_lunes->fetchObject()): ?>
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
                                                            <td>
                                                                <?=$lunes->nombre_g?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                <?php else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No tienes clases.</span></p>
                                                <?php endif; ?>
                                            </article>
                                            <article class="col-md-4 text-center">
                                                <span class="dia">
                                                    Martes
                                                </span>
                                                <?php if($dia_martes->rowCount() > 0): ?>
                                                    <div>
                                                <table class="table shadow text-center table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                Inicio
                                                            </th>
                                                            <th>
                                                                Fin
                                                            </th>
                                                            <th scope="col">
                                                                Materia
                                                            </th>
                                                            <th>
                                                                Grado
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($martes = $dia_martes->fetchObject()): ?>
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
                                                            <td>
                                                                <?=$martes->nombre_g?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <?php else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No tienes clases.</span></p>
                                                <?php endif; ?>
                                            </article>
                                            <article class="col-md-4 text-center">
                                                <span class="dia">
                                                    Miercoles
                                                </span>
                                                    <?php if($dia_miercoles->rowCount() > 0): ?>
                                                        <div>
                                                <table class="table shadow text-center table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                           <th scope="col">
                                                                Inicio
                                                            </th>
                                                            <th>
                                                                Fin
                                                            </th>
                                                            <th scope="col">
                                                                Materia
                                                            </th>
                                                            <th>
                                                                Grado
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($miercoles = $dia_miercoles->fetchObject()): ?>
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
                                                            <td>
                                                                <?=$miercoles->nombre_g?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <?php else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No tienes clases.</span></p>
                                                <?php endif; ?>
                                            </article>
                                            <article class="col-md-4 text-center">
                                                <span class="dia">
                                                    Jueves
                                                </span>
                                                <?php if($dia_jueves->rowCount() > 0): ?>
                                                    <div>
                                                <table class="table shadow text-center table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                Inicio
                                                            </th>
                                                            <th>
                                                                Fin
                                                            </th>
                                                            <th scope="col">
                                                                Materia
                                                            </th>
                                                            <th>
                                                                Grado
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php while($jueves = $dia_jueves->fetchObject()): ?>
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
                                                            <td>
                                                                <?=$jueves->nombre_g?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <?php else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No tienes clases.</span></p>
                                                <?php endif; ?>
                                            </article>
                                            <article class="col-md-4 text-center">
                                                <span class="dia">
                                                    Viernes
                                                </span>
                                                <?php if($dia_viernes->rowCount() > 0): ?>
                                                    <div>
                                                <table class="table shadow text-center table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                Inicio
                                                            </th>
                                                            <th>
                                                                Fin
                                                            </th>
                                                            <th scope="col">
                                                                Materia
                                                            </th>
                                                            <th>
                                                                Grado
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php while($viernes = $dia_viernes->fetchObject()): ?>
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
                                                            <td>
                                                                <?=$viernes->nombre_g?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <?php else: ?>
                                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No tienes clases.</span></p>
                                                <?php endif; ?>
                                            </article>
                                        </section>
                                        <!-- fin del horario -->
                                    </section>
                                    <section aria-labelledby="pills-contact-tab" class="tab-pane fade" id="pills-contact" role="tabpanel">
                                        <!-- inicio informacion del docente -->
                                        <article class="row justify-content-center">
                                            <article class="col-md-10 text-center">
                                                <section class="row shadow">
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Nombre:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->nombre_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Apellidos:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->apellidos_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Fecha de nacimiento:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->fecha_nacimiento_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Edad:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->edad_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                </section>
                                                <hr/>
                                                <section class="row shadow">
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Tipo:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->tipo_identificacion_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Número:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->numero_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Lugar de expedición:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->lugar_expedicion_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Fecha de expedición:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->fecha_expedicion_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                </section>
                                                <hr/>
                                                <section class="row shadow">
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Dirección:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->direccion_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Correo electrónico:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->correo_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Numero de celular:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->telefono_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                </section>
                                                <hr/>
                                                <section class="row shadow">
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Religión:
                                                        </span>
                                                        <span class="valor_item">
                                                           <?=$docente->religion_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Incapacidad médica:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->incapacidad_medica_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Grupo sanguíneo:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->grupo_sanguineo_d?>
                                                        </span>
                                                            <hr/>
                                                        <span class="item_info">
                                                            RH:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->rh_d?>
                                                        </span>
                                                            <hr/>
                                                    </div>
                                                </section>
                                                <hr/>
                                                <section class="row shadow">
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Fecha de posesión:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->fecha_posesion_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Número resolución de posesión:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->numero_resolucion_posesion_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Número acta de posesión:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->numero_acta_posesion_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                </section>
                                                <hr/>
                                                <section class="row shadow">
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Título de pregrado:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->pregrado_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Nombre título de pregrado:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->nombre_pregrado_d?>
                                                        </span>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="item_info">
                                                            Título de posgrado:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->posgrado_d?>
                                                        </span>
                                                        <hr/>
                                                        <span class="item_info">
                                                            Nombre título de posgrado:
                                                        </span>
                                                        <span class="valor_item">
                                                            <?=$docente->nombre_posgrado_d?>
                                                        </span>
                                                    </div>
                                                </section>
                                                <hr/>
                                            </article>
                                        </article>    
                                        <!-- fin informacion del  docente -->
                                    </section>
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
    <!-- Modal para cambiar la foto de perfil -->
            <!-- Modal -->
            <section class="modal fade " id="fotoPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
              <section class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar la foto de perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form action="<?=base_url?>Docente/actualizarFotoPerfil" method="post" enctype="multipart/form-data">
                            <input type="text " hidden name="docente" value="<?=$docente->id?>">
                            <input type="text" hidden name="foto_actual" value="<?=$docente->img?>">
                            <div>
                              <label for="perfil" class="form-label">Elija la nueva foto de perfil</label>
                              <input class="form-control form-control-lg" id="perfil" name="foto_perfil" type="file" required>
                            </div>
                            <hr/>
                            <div class="d-grid gap-2 mt-3">
                              <button class="btn btn-outline-success" type="submit">Guardar</button>
                              <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                        </form>
                  </div>
              </section>
            </section>
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
                    <form action="<?=base_url?>Docente/cambiarPass" method="post">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" hidden name="id_docente" value="<?=$info_docente->id?>">
                                <input class="form-control" name="new_pass" id="new_pass" required="" type="text"/>
                                <label for="new_pass">
                                    Contraseña nueva:
                                </label>
                            </div>
                            <div class="d-grid gap-2">
                              <button class="btn btn-outline-success" type="submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </section>
        <!-- #modal para axtualizar datos -->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="actualizarDatos" tabindex="-1">
            <section class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Actualizar datos del docente
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="<?=base_url?>Docente/registrarDocente" method="post">
                        <section class="modal-body">
                            <section class="row justify-content-center mt-5">
                            <input type="text" hidden name="actualizarDocente" value="<?=$info_docente->id?>">
                            <section class="">
                                <section class="row shadow">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Nombres:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" type="text" name="nombres" value="<?=$info_docente->nombre_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Fecha de nacimiento:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" type="date" name="nacimiento" value="<?=$info_docente->fecha_nacimiento_d?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Apellidos:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" type="text" name="apellidos" value="<?=$info_docente->apellidos_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Edad:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="edad" type="text" value="<?=$info_docente->edad_d?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row shadow">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Tipo:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="tipo" type="text" value="<?=$info_docente->tipo_identificacion_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Lugar de expedición:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="expedicion" type="text" value="<?=$info_docente->lugar_expedicion_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Genero:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="sexo" type="text" value="<?=$info_docente->sexo_d?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Numero:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="numero" type="number" value="<?=$info_docente->numero_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Fecha de expedición:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="fecha" type="date" value="<?=$info_docente->fecha_expedicion_d?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row shadow">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Dirección:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="direccion" type="text" value="<?=$info_docente->direccion_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Correo electronico:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="correo" type="text" value="<?=$info_docente->correo_d?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Número de celular:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="telefono" type="number" value="<?=$info_docente->telefono_d?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row shadow">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Religión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="religion" type="text" value="<?=$info_docente->religion_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Grupo sanguíneo:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="grupo" type="text" value="<?=$info_docente->grupo_sanguineo_d?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Incapacidad médica:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput"  name="incapacidad" type="text" value="<?=$info_docente->incapacidad_medica_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Rh:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="rh" type="text" value="<?=$info_docente->rh_d?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row shadow">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Fecha de posesión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="fecha_posesion" type="date" value="<?=$info_docente->fecha_posesion_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Número resolución de posesión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="resolucion_posesion" type="number"value="<?=$info_docente->numero_resolucion_posesion_d?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Número acta de posesión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="acta_posesion" type="number" value="<?=$info_docente->numero_acta_posesion_d?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <div class="row shadow">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Título de pregrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="pregrado" type="text" value="<?=$info_docente->pregrado_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Título de posgrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="posgrado" type="text" value="<?=$info_docente->posgrado_d?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Nombre del título  de pregrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="nombre_pregrado" type="text" value="<?=$info_docente->nombre_pregrado_d?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Nombre del título de posgrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="nombre_posgrado" type="text" value="<?=$info_docente->nombre_posgrado_d?>">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-grid gap-2 mb-3">
                                    <button class="btn btn-outline-success" type="submit">
                                        Actualizar
                                    </button>
                                </div>
                            </section>
                        </section>
                        </section>
                    </form>
                </div>
            </section>
        </section>
        <!-- fin del modal -->
        <!-- ================================================
    =================FIN MODALES====================
    ================================================= -->