 <!-- inicio del contenido de la pagina -->
            <section class="container-fluid">
                      <section class="row shadow titulo mb-3">
                    <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                        <h1 class="text-center config">
                            <?=$nombre_ma?> <?=$nombre_gra?>°
                        </h1>
                    </article>

                    <?php if (isset($_SESSION['teacher'])): ?>
                    <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                        <acticle class="btn-group dropstart">
                            <a aria-expanded="false" class="" data-bs-toggle="dropdown" type="button">
                                <i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;" data-bs-toggle="tooltip" data-bs-placement="left" title="Menú">
                                </i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" data-bs-target="#registroDeInasistencia" data-bs-toggle="modal" href="#">
                                        Tomar asisencia
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-bs-target="#subirDocumentos" data-bs-toggle="modal" href="#">
                                        Surbir documentos
                                        <span class="punto-documentos">
                                            ●
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-bs-target="#registrarActividad" data-bs-toggle="modal" href="#">
                                        Registrar actividad
                                        <span class="punto-actividades">
                                            ●
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </acticle>
                    </article>
                <?php else: ?>
                <?php endif?>
                <?php if (isset($_SESSION['user'])): ?>
                    <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#informacion">
                        <i class="bi bi-info-circle efecto_hover" style="font-size: 2rem; color: white;"></i>
                    </a>
                    </article>
                <?php endif;?>
                </section>
                <?php echo Utils::general_alerts('GuardarDocumentosDClase', 'Documento registrado con éxito.', 'Error al intentar registrar el documento, inténtelo de nuevo.') ?>
                <?php echo Utils::general_alerts('eliminarDocumentoDClase', 'Documento eliminado con éxito.', 'Error al intentar borrar el documento, inténtelo de nuevo.') ?>
                 <?php echo Utils::general_alerts('tituloRepetido', '', 'El título de este documento ya está registrado en esta materia, cámbialo.') ?>
                 <?php echo Utils::general_alerts('documentoRepetido', '', 'El nombre del documento ya está registrado en esta materia, cámbialo.') ?>
                 <?php echo Utils::general_alerts('GuardarActividadesDClase', 'Actividad registrada con éxito.', 'Error al intentar registrar la actividad, inténtelo de nuevo.') ?>
                 <?php echo Utils::general_alerts('estadoA', '', 'El título de esta actividad ya está registrado en esta materia, cámbialo.') ?>
                 <?php echo Utils::general_alerts('registrarFallas', 'Asistencia registrada con éxito.', 'Algo salió mal al intentar registrar la asistencia, inténtalo de nuevo.') ?>
                 <?php echo Utils::general_alerts('eliminarActividad', 'Activada eliminada con éxito.', 'Algo salió mal al intentar eliminar la actividad, inténtelo de nuevo.') ?>
                 <?php echo Utils::general_alerts('validarNumeroDArchivos', '', 'No es posible subir este archivo, recuerda que el número de archivos por materia no debe ser mayor de 10, elimina un archivo para poder subir este.') ?>
                 <?php echo Utils::general_alerts('actualizarAsignacionDeMateria', 'Muy bien, la materia ya está disponible para ser asignada a un docente.', 'Algo salió mal al intentar cambiar es estado de asignación de la materia, inténtelo de nuevo.'); ?>

                 <?php Utils::borrar_error('GuardarDocumentosDClase');
                 Utils::borrar_error('eliminarDocumentoDClase');
                 Utils::borrar_error('tituloRepetido');
                 Utils::borrar_error('documentoRepetido');
                 Utils::borrar_error('GuardarActividadesDClase');
                 Utils::borrar_error('estadoA');
                 Utils::borrar_error('registrarFallas');
                 Utils::borrar_error('eliminarActividad');
                 Utils::borrar_error('validarNumeroDArchivos');
                 Utils::borrar_error('actualizarAsignacionDeMateria');
                 ?>
                <section class="row">
                    <article class="col-md-4">
                        <h3 class="text-center mb-3 titulo-seccion">
                            Listado de estudiantes
                        </h3>
                        <hr/>
                        <?php if ($listado_estudiantes->rowCount() != 0): ?>
                        <div class="shadow">
                                <table class="table table-hover table-responsive">
                                    <thead class="">
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>

                                            </th>
                                            <th>
                                                <h4>
                                                    Estudiantes
                                                </h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class=" texto-body">
                                        <?php $c = 1;
                                        while ($estudiantes = $listado_estudiantes->fetchObject()): ?>
                                            <tr>
                                                <td>
                                                    <?=$c++?>
                                                </td>
                                                <td>
                                                    <img class="avatar-tabla circulo" src="<?=base_url?>photos/estudiantes/<?=$estudiantes->img?>" alt="">
                                                </td>
                                                <td class="texto_tabla_docente">
                                                    <a href="<?=base_url?>Notas/homeNotas&student=<?=Utils::encryption($estudiantes->id)?>&materia=<?=Utils::encryption($materia)?>&nGrado=<?=$nombre_gra?>&event=bad">
                                                        <?=$estudiantes->nombre_e;?> <?=$estudiantes->apellidos_e?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger text-center" role="alert">
                                No hay estudiantes matriculados
                            </div>
                        <?php endif;?>
                    </article>
                    <!-- inicio de las  actividades -->
                    <article class="col-xs-12 col-sm-12 col-md-5">
                        <h3 class="text-center titulo-seccion">
                            Documentos de la clase
                            <span class="punto-documentos">
                                ●
                            </span>
                        </h3>
                        <hr/>
                        <?php if ($listado_documentos->rowCount() != 0): ?>
                            <?php while ($datos_documetos = $listado_documentos->fetchObject()): ?>
                                <section class="card mb-3 shadow">
                                    <article class="card-header">
                                        <section class="row">
                                            <span class="col-xs-10 col-sm-10 col-md-10 text-center">
                                                <?=$datos_documetos->titulo?>
                                                <span class="badge bg-success">
                                                    <?=$datos_documetos->fecha?>
                                                </span>
                                            </span>
                                            <span class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
                                                <a class="icono-actividades" download="<?=$datos_documetos->documento?>" href="<?=base_url?>documentos/materias/<?=$datos_documetos->documento?>">
                                                    <i class="bi bi-download" style="font-size: 1.2rem;">
                                                    </i>
                                                </a>
                                            </span>
                                            <span class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
                                                <a class="icono-actividades " onclick="return confirmar()" href="<?=base_url?>panelMateria/eliminarDocumentoDClase&nameDocu=<?=$datos_documetos->documento?>&id_docu=<?=$datos_documetos->id?>&degree=<?=$grado?>&ide=<?=$materia?>&name=<?=$nombre_ma?>&nombreg=<?=$nombre_gra?>">
                                                    <i class="bi bi-trash" style="font-size: 1.2rem;">
                                                    </i>
                                                </a>
                                            </span>
                                        </section>
                                    </article>
                                    <article class="card-body">
                                        <span class="badge rounded-pill bg-info text-dark">
                                            <?=$datos_documetos->formato?>
                                        </span>
                                        <p class="card-text text-documento">
                                            <?=$datos_documetos->descripcion?>
                                        </p>
                                    </article>
                                </section>
                            <?php endwhile;?>
                        <?php else: ?>
                            <div class="alert alert-danger text-center" role="alert">
                                No hay documentos.
                            </div>
                        <?php endif;?>
                    </article>
                    <!-- inicio de los recordatorioscol-xs-12 col-sm-12  -->
                    <article class="col-xs-12 col-sm-12 col-md-3 ">
                        <h3 class="text-center titulo-seccion">
                            Actividades
                            <span class="punto-actividades">
                                ●
                            </span>
                        </h3>
                        <hr/>
                        <?php if ($listado_actividades->rowCount() != 0): ?>
                            <?php while ($actividad = $listado_actividades->fetchObject()): ?>
                                <section class="card text-black mb-3 shadow">
                                    <article class="card-body">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h6 class="card-title tituloActividad">
                                                    <?=$actividad->titulo_actividad?>
                                                    <span class="badge bg-success">
                                                    <?=$actividad->fecha?>
                                                    </span>
                                                </h6>
                                            </div>
                                            <div class="col-md-2">
                                                <a onclick="return confirmar()" href="<?=base_url?>PanelMateria/eliminarActividad&id=<?=$actividad->id?>&degree=<?=$grado?>&ide=<?=$materia?>&name=<?=$nombre_ma?>&nombreg=<?=$nombre_gra?>" class="icono-actividades">
                                                    <i class="bi bi-trash" style="font-size: 1.2rem;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <p class="card-text text-actividad text-black ">
                                            <?=$actividad->descripcion?>
                                        </p>
                                    </article>
                                </section>
                            <?php endwhile;?>
                        <?php else: ?>
                           <div class="alert alert-danger text-center" role="alert">
                              No hay actividades.
                          </div>
                        <?php endif;?>
                    </article>
                </section>
            </section>
            <!-- fin del coternido de la pagina -->
             <!-- Modal para registrar inasistencia-->
            <article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="registroDeInasistencia" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Registro de inasistencia
                            </h5>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            </button>
                        </div>
                        <form action="<?=base_url?>PanelMateria/registrarFallas" method="post">
                            <input type="text" hidden="true" name="id_materia" value="<?=$materia?>">
                            <input type="text" hidden="true" name="degree" value="<?=$grado?>">
                            <input type="text" hidden="true" name="name" value="<?=$nombre_ma?>">
                            <input type="text" hidden="true" name="nombreg" value="<?=$nombre_gra?>">
                        <div class="modal-body">
                                <table class="table table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Estudiante
                                            </th>
                                            <th>
                                                Falla
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php if ($colocar_falla->rowCount() != 0): ?>
                                            <?php
                                            $c = 0;
                                            while ($listado_e = $colocar_falla->fetchObject()):
                                                $c++;
                                                ?>
                                                <tr>
                                                   <td>
                                                       <?=$c?>
                                                   </td>
                                                   <td>
                                                       <a href="">
                                                           <?=$listado_e->nombre_e?> <?=$listado_e->apellidos_e?>
                                                       </a>
                                                   </td>
                                                   <td>
                                                       <span class="form-check">
                                                           <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="ids[]" value="<?=$listado_e->id?>">
                                                       </input>
                                                   </span>
                                               </td>
                                           </tr>
                                       <?php endwhile;?>
                                   <?php else: ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        No hay estudiantes matriculados.
                                    </div>
                                <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                    Cerrar
                                </button>
                                <button class="btn btn-outline-success" type="submit">
                                    Registrar falla
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Modal para registrar actividades-->
            <article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="registrarActividad" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Registrar actividades
                                <span class="punto-actividades">
                                    ●
                                </span>
                            </h5>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            </button>
                        </div>
                        <form action="<?=base_url?>panelMateria/GuardarActividadesDClase" method="post">
                            <input type="text" hidden="true" name="id_materia" value="<?=$materia?>">
                            <input type="text" hidden="true" name="degree" value="<?=$grado?>">
                            <input type="text" hidden="true" name="name" value="<?=$nombre_ma?>">
                            <input type="text" hidden="true" name="nombreg" value="<?=$nombre_gra?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">
                                                Título de la actividad:
                                            </label>
                                            <input class="form-control" id="exampleFormControlInput1" placeholder="Actividad" required="" type="text" name="tituloA" autocomplete="off">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">
                                                Fecha de la actividad:
                                            </label>
                                            <input class="form-control" id="exampleFormControlInput1" type="date" name="fechaA">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlTextarea1">
                                        Descripción:
                                    </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcionA">
                                    </textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                    Cerrar
                                </button>
                                <button class="btn btn-outline-success" type="submit">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Modal para adjuntar documentos -->
            <article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="subirDocumentos" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Registrar talleres con documentos adjuntos
                                <span class="punto-documentos">
                                    ●
                                </span>
                            </h5>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            </button>
                        </div>
                        <form action="<?=base_url?>panelMateria/GuardarDocumentosDClase" enctype="multipart/form-data" method="post">
                            <input type="text" hidden="true" name="id_materia" value="<?=$materia?>">
                            <input type="text" hidden="true" name="degree" value="<?=$grado?>">
                            <input type="text" hidden="true" name="name" value="<?=$nombre_ma?>">
                            <input type="text" hidden="true" name="nombreg" value="<?=$nombre_gra?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">
                                                Título de la actividad:
                                            </label>
                                            <input autocomplete="off" class="form-control" id="exampleFormControlInput1" placeholder="Actividad" required="" type="text" name="titulo">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">
                                                Fecha de la entrega:
                                            </label>
                                            <input class="form-control" id="exampleFormControlInput1" type="date" name="fecha_entrega">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="formFile">
                                                Seleccione el documento:
                                            </label>
                                            <input class="form-control" id="formFile" type="file" name="documento">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="exampleFormControlInput1">
                                            Formato:
                                        </label>
                                        <select aria-label="Default select example" class="form-select" name="formato">
                                            <option>
                                            </option>
                                            <option value="PDF">
                                                PDF
                                            </option>
                                            <option value="Word">
                                                Word
                                            </option>
                                            <option value="Excel">
                                                Excel
                                            </option>
                                            <option value="img">
                                                Imagen
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlTextarea1">
                                            Descripción:
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                    Cancelar
                                </button>
                                <button class="btn btn-outline-success" type="submit">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>

            <!-- Modal para mostrar la informacion de la materia -->
            <article class="modal fade" id="informacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <?php if (!empty($datos_materia)): ?>
                            <h1 class="text-center config text-black mb-3">Información de la materia</h1>
                            <hr/>
                            <div class="alert alert-info" role="alert">
                                <p class="info-materia">La materia <strong><?=$datos_materia->nombre_mat?></strong> pertenece al área  de <strong><?=$datos_materia->nombre_area?></strong>. La materia está asignada al docente <strong><?=$datos_materia->nombre_d?> <?=$datos_materia->apellidos_d?></strong>.</p>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                              Cuando la materia tenga un docente asignado se podrá ver la información.
                          </div>
                            <?php if ($estado->asignacion == 'si'): ?>
                                <div class="alert alert-danger" role="alert">
                                    <p class="mt-3">Esta materia aparece como si estuviese asignada a un docente, esto no es verdad, la razón es porque en el pasado la materia le sí fue asignada a un docente, pero el docente fue eliminado de la plataforma y la materia quedo con el estado <strong>"asignada"</strong>, debes actualizar el estado para que la materia esté disponible para ser asignada a otro docente.</p>
                                    <form action="<?=base_url?>Materias/actualizarAsignacionDeMateria" method="post">
                                        <input type="text" hidden="true" name="id_materia" value="<?=$materia?>">
                                        <input type="text" hidden="true" name="degree" value="<?=$grado?>">
                                        <input type="text" hidden="true" name="name" value="<?=$nombre_ma?>">
                                        <input type="text" hidden="true" name="nombreg" value="<?=$nombre_gra?>">
                                        <div class="d-grid gap-2">
                                          <button onclick="return confirm('Clic en Aceptar para seguir con el proceso de cambiar el estado.')" class="btn btn-danger" type="submit">Clic para cambiar el estado de la materia</button>
                                      </div>
                                  </form>
                              </div>
                            <?php endif;?>
                        <?php endif;?>
                        <div class="d-grid gap-2">
                          <a href="<?=base_url?>Materias/eliminarMateria&materia=<?=$materia?>&degree=<?=$grado?>" onclick="return confirm('¿Está seguro que desea eliminar la materia?')" class="btn btn-warning" type="button">Eliminar materia</a>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </article>
