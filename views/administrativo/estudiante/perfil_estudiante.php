            <!-- contenido de  la pagina -->
            <section class="container-fluid">
                <?php echo Utils::general_alerts('actualizarE', 'La información del estudiante se actualizó con éxito.', 'Algo salió mal al actualizar la información del estudiante.') ?>
                <?php echo Utils::general_alerts('cambiarPhoto', 'La foto ha sido actualizada con éxito.', 'La foto ha sido actualizada con éxito.'); ?>
                <?php Utils::borrar_error('actualizarE');
                Utils::borrar_error('cambiarPhoto');?>
                <!-- inicon de la fila principal -->
                <section class="row">
                    <article class="col-md-5">
                        <div class="card mb-3">
                            <img alt="..." class="card-img-top" src="<?=base_url?>helpers/img/estudiante.jpg">
                            <div class="card-body">
                                <div class="row">
                                    <article class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <article class="flex-shrink-0 contenedor-img-perfil">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#fotoPerfil">
                                                <?php if ($estudiante->img == null): ?>
                                                    <img alt="..." class="avatar-perfil" src="<?=base_url?>helpers/img/avatar.jpg">
                                                </img>
                                            <?php else: ?>
                                                <img alt="..." class="avatar-perfil" src="<?=base_url?>photos/estudiantes/<?=$estudiante->img?>">
                                            </img>
                                        <?php endif; ?>
                                    </a>
                                </article>
                            </article>
                            <article class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <span class="titulo-perfil-perfil">
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
                                                     <i class="bi bi-key"></i>
                                                     Cambiar contraseña
                                                 </a>
                                             </li>
                                             <li>
                                                <hr class="dropdown-divider"/>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-target="#actualizarDatos" data-bs-toggle="modal">
                                                    <i class="bi bi-pen"></i>  Actualizar datos
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
                                <span   class="item_perfil">
                                    <?=$estudiante->telefono_e?>
                                </span>
                            </p>
                        </article>
                        <article class="col-md-6">
                            <p>
                                <span class="posicion">
                                    Direccion
                                </span>
                                <br/>
                                <span   class="item_perfil">
                                    <?=$estudiante->direccion_e?>
                                </span>
                            </p>
                        </article>
                        <article class="col-md-2">
                            <p>
                                <span class="posicion">
                                    Grado
                                </span>
                                <br/>
                                <span   class="item_perfil">
                                    <?=$estudiante->nombre_g?>
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
           <h2 class="text-center">Gráfica o informes.</h2>
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
                        Horario de clase
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
                        <h3 class="text-center mb-2 mt-3 mb-4 titulo-perfil">
                            Materias
                        </h3>
                        <?php if (isset($datos) && $datos->rowCount() != 0):
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
                                           <a class="stretched-link" href="<?=base_url?>Notas/homeNotas&student=<?=Utils::encryption($estudiante->estudiante_id)?>&materia=<?=Utils::encryption($materias->id)?>&nGrado=<?=$estudiante->nombre_g?>">
                                           </a>
                                       </div>
                                   </div>
                               </article>
                           <?php endwhile;?>
                       <?php else: ?>
                        <div class="alert alert-danger text-center" role="alert">
                            No hay materias asignadas a este estudiante
                        </div>
                       <?php endif;?>
                   </section>
                   <!-- fin materias -->
               </article>
               <article aria-labelledby="pills-profile-tab" class="tab-pane fade" id="pills-profile" role="tabpanel">
                <!--inicion del horario  -->
                <section class="row">
                    <h3 class="text-center mb-2 mt-3  mb-3 titulo-perfil">
                        Horario de clase
                    </h3>
                    <article class="col-md-4 text-center">
                        <span class="dia">
                            Lunes
                        </span>
                        <hr/>
                        <?php if ($lista_lunes->rowCount() != 0): ?>
                        <div>
                            <table class="table shadow text-center table-bordered table-hover">
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
                                        <?php while ($lunes = $lista_lunes->fetchObject()): ?>
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
                                       <?php endwhile;?>
                                   </tbody>
                               </table>
                           </div>
                       <?php else: ?>
                        <div class="alert alert-danger text-center" role="alert">
                            No hay materias asignadas.
                        </div>
                    <?php endif;?>
                    <hr/>
                </article>
                <article class="col-md-4 text-center">
                   <span class="dia">
                    Martes
                </span>
                <hr/>
                <?php if ($lista_martes->rowCount() != 0):?>
                    <div>
                        <table class="table shadow text-center table-bordered table-hover">
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
                                <?php while ($martes = $lista_martes->fetchObject()): ?>
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
                               <?php endwhile;?>
                               </tbody>
                               </table>
                               </div>
                           <?php else: ?>
                            <div class="alert alert-danger text-center" role="alert">
                                No hay materias asignadas.
                            </div>
                        <?php endif;?>
                        <hr/>
        </article>
        <article class="col-md-4 text-center">
             <span class="dia">
            Miércoles
        </span>
        <hr/>
        <?php if ($lista_miercoles->rowCount() != 0):?>
            <div>
                <table class="table shadow text-center table-bordered table-hover">
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
                        <?php while ($miercoles = $lista_miercoles->fetchObject()): ?>
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
                       <?php endwhile;?>
                   </tbody>
               </table>
           </div>
       <?php else: ?>
        <div class="alert alert-danger text-center" role="alert">
            No hay materias asignadas.
        </div>
    <?php endif;?>
    <hr/>
</article>
<article class="col-md-4 text-center">
    <span class="dia">
        Jueves
    </span>
    <hr/>
    <?php if ($lista_jueves->rowCount() != 0):?>
    <div>
        <table class="table shadow text-center table-bordered table-hover ">
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
                    <?php while ($jueves = $lista_jueves->fetchObject()): ?>
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
                   <?php endwhile;?>
        </tbody>
    </table>
</div>
               <?php else: ?>
                <div class="alert alert-danger text-center" role="alert">
                    No hay materias asignadas.
                </div>
            <?php endif;?>
            <hr/>
</article>
<article class="col-md-4 text-center">
    <span class="dia">
        Viernes
    </span>
    <hr/>
    <?php if ($lista_viernes->rowCount() != 0):?>
    <div>
        <table class="table shadow text-center table-bordered table-hover ">
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
                   <?php while ($viernes = $lista_viernes->fetchObject()): ?>
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
                   <?php endwhile;?>
        </tbody>
    </table>
</div>
               <?php else: ?>
                <div class="alert alert-danger text-center" role="alert">
                    No hay materias asignadas.
                </div>
            <?php endif;?>
            <hr/>
</article>
</section>
<!-- fin del horario -->
</article>
<section aria-labelledby="pills-contact-tab" class="tab-pane fade" id="pills-contact" role="tabpanel">
    <section class="row mt-3 mb-5">
        <!-- inicio informacion del estdiante -->
        <section class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-2">
                        <?php if ($estudiante->img == null): ?>
                            <img alt="..." class="avatar circulo" src="<?=base_url?>helpers/img/avatar.jpg"/>
                        <?php else: ?>
                        <img class="avatar circulo" src="<?=base_url?>photos/estudiantes/<?=$estudiante->img?>">
                        <?php endif; ?>
                        <h5 class="card-title"><?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Estudiante</h6>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Fecha de nacimiento:</span> <span class="valor_item"><?=$estudiante->fecha_nacimiento_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Edad: </span> <span class="valor_item"><?=Utils::hallarEdad($estudiante->fecha_nacimiento_e)?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Tipo idantificacion:</span> <span class="valor_item"><?=$estudiante->tipo_identificacion_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Número identifición:</span> <span class="valor_item"><?=$estudiante->numero_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Lugar de expedición:</span> <span class="valor_item"><?=$estudiante->lugar_expedicion_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Fecha de expedición:</span> <span class="valor_item"><?=$estudiante->fecha_expedicion_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Dirección de residencia:</span> <span class="valor_item"><?=$estudiante->direccion_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Telefono:</span> <span class="valor_item"><?=$estudiante->telefono_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Correo:</span> <span class="valor_item"><?=$estudiante->correo_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Religion:</span> <span class="valor_item"><?=$estudiante->religion_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Grupo sanguíneo + RH:</span> <span class="valor_item"><?=$estudiante->grupo_sanguineo_e?> <?=$estudiante->rh_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Incapacidad medica:</span> <span class="valor_item"><?=$estudiante->incapacidad_medica_e?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">Tranasporte:</span> <span class="valor_item"><?=$estudiante->transporte?></span>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <span class="item_info">PAE:</span> <span class="valor_item"><?=$estudiante->pae?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fin info estudiantes -->
        <!-- inicio info padres -->
        <section class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-2">
                        <img class="avatar circulo" src="<?=base_url?>photos/estudiantes/familia.jpg">
                        <h5 class="card-title">Padres de <?=$estudiante->nombre_e?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Familia</h6>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <span class="valor_item">Madre</span>
                        <?php if (!empty($estudiante->nombre_m)): ?>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Nombre: </span> <span class="valor_item"><?=$estudiante->nombre_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Apellidos: </span>  <span class="valor_item"><?=$estudiante->apellidos_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Fecha de nacimiento: </span>    <span class="valor_item"><?=$estudiante->fecha_nacimiento_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Edad: </span>   <span class="valor_item"><?=Utils::hallarEdad($estudiante->fecha_nacimiento_m)?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Tipo identifición: </span>  <span class="valor_item"><?=$estudiante->tipo_identificacion_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Número identifición: </span>    <span class="valor_item"><?=$estudiante->numero_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Lugar de expedición: </span>    <span class="valor_item"><?=$estudiante->lugar_expedicion_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Fecha expedición: </span>   <span class="valor_item"><?=$estudiante->fecha_expedicion_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Telefono: </span>   <span class="valor_item"><?=$estudiante->telefono_m?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Ocupación: </span>  <span class="valor_item"><?=$estudiante->ocupacion_m?></span>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                No hay información de la mamá.
                            </div>
                        <?php endif;?>
                        <hr/>
                        <span class="valor_item">Padre</span>
                        <?php if (!empty($estudiante->nombre_p)): ?>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Nombre: </span> <span class="valor_item"><?=$estudiante->nombre_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Apellidos: </span>  <span class="valor_item"><?=$estudiante->apellidos_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Fecha de nacimiento: </span>    <span class="valor_item"><?=$estudiante->fecha_nacimiento_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Edad: </span>   <span class="valor_item"><?=Utils::hallarEdad($estudiante->fecha_nacimiento_p)?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Tipo identifición: </span>  <span class="valor_item"><?=$estudiante->tipo_identificacion_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Número identifición: </span>    <span class="valor_item"><?=$estudiante->numero_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Lugar de expedición: </span>    <span class="valor_item"><?=$estudiante->lugar_expedicion_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Fecha expedición: </span>   <span class="valor_item"><?=$estudiante->fecha_expedicion_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Telefono: </span>   <span class="valor_item"><?=$estudiante->telefono_p?></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <span class="item_info">Ocupación: </span>  <span class="valor_item"><?=$estudiante->ocupacion_p?></span>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                No hay información del papá.
                            </div>
                        <?php endif;?>
                        <hr/>
                        <span class="valor_item">Otros datos</span>
                        <div class="col-md-6 mt-3">
                            <span class="item_info">Dirección: </span>  <span class="valor_item"><?=$estudiante->direccion?></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <span class="item_info">Correo: </span> <span class="valor_item"><?=$estudiante->correo?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fin info padres -->
    </section>
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
                <form action="<?=base_url?>Estudiante/cambiarPassword" method="post">
                    <div class="modal-body">
                        <input type="text" hidden name="id" value="<?=$estudiante->estudiante_id?>">

                        <div class="form-floating mb-3">
                            <input class="form-control" id="new_pass" required="" type="text" name="new_pass" />
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
  <!--  modal para actualizar datos -->
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
            <form action="<?=base_url?>Estudiante/fotoPerfil" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" hidden name="x" value="<?=$estudiantePadres->estudiante_id?>">
                    <input type="text" hidden name="y" value="<?=$estudiantePadres->padres?>">
                    <input type="text" hidden name="z" value="<?=$estudiantePadres->id_gradoE?>">
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
<!-- fin del modal para cambiar la foto de perfil -->
<section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="actualizarDatos" tabindex="-1">
    <section class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Actualizar datos del estudiante
                </h5>
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
                    <input class="form-control " disabled id="edad" name="edad" placeholder="edad" required="" type="number" value="<?=Utils::hallarEdad($estudiantePadres->fecha_nacimiento_e)?>">
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
        <input class="form-control" id="edad_m" name="edad_m" placeholder="Edad"  type="number" value="<?=Utils::hallarEdad($estudiantePadres->fecha_nacimiento_m)?>">
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
        <input class="form-control" id="edad_pa" name="edad_pa" placeholder="Edad"  type="number" value="<?=Utils::hallarEdad($estudiantePadres->fecha_nacimiento_p)?>">
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
        Actualizar
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