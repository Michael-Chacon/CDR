 <!-- inicio del contenido de la pagina -->
            <section class="container-fluid">
                <?php echo Utils::general_alerts('GuardarDocumentosDClase', 'Documento registrado con éxito.', 'Error al intentar registrar el documento, inténtelo de nuevo.')?>
                <?php echo Utils::general_alerts('eliminarDocumentoDClase', 'Documento eliminado con éxito.', 'Error al intentar borrar el documento, inténtelo de nuevo.') ?>
                 <?php echo Utils::general_alerts('tituloRepetido', '', 'El título de este documento ya está registrado en esta materia, cámbialo.') ?>
                 <?php echo Utils::general_alerts('documentoRepetido', '', 'El nombre del documento ya está registrado en esta materia, cámbialo.') ?>

                <?php Utils::borrar_error('GuardarDocumentosDClase');
                            Utils::borrar_error('eliminarDocumentoDClase'); 
                            Utils::borrar_error('tituloRepetido');
                            Utils::borrar_error('documentoRepetido');?>

                <section class="row shadow titulo mb-3">
                    <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                        <h1 class="text-center config">
                            <?=$nombre_ma?> <?=$nombre_gra?>° 
                        </h1>
                    </article>
                    <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                        <acticle class="btn-group dropstart">
                            <a aria-expanded="false" class="" data-bs-toggle="dropdown" type="button">
                                <i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;">
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
                </section>
                <section class="row">
                    <article class="col-md-4">
                        <h3 class="text-center mb-3 titulo-seccion">
                            Listado de estudiantes
                        </h3>
                        <hr/>
                        <div class="shadow">
                            <?php if ($listado_estudiantes->rowCount() != 0): ?>
                                <table class="table table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                <h4>
                                                    Estudiantes
                                                </h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center texto-body">
                                        <?php $c = 1;
                                            while ($estudiantes = $listado_estudiantes->fetchObject()): ?>
                                            <tr>
                                                <td>
                                                    <?=$c++?>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <?=$estudiantes->nombre_e;?> <?=$estudiantes->apellidos_e?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile;?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay estudiantes matriculados.</span></p>
                            <?php endif;?>
                        </div>
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
                        <?php if($listado_documentos->rowCount() != 0): ?>
                            <?php while($datos_documetos = $listado_documentos->fetchObject()): ?>
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
                                            <a class="icono-actividades " onclick="confirmar()" href="<?=base_url?>panelMateria/eliminarDocumentoDClase&id_docu=<?=$datos_documetos->id?>&degree=<?=$grado?>&ide=<?=$materia?>&name=<?=$nombre_ma?>&nombreg=<?=$nombre_gra?>">
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
                        <?php endwhile; ?>
                     <?php else: ?>
                        <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay documentos.</span></p>
                    <?php endif; ?>
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
                        <section class="card text-black mb-3 shadow">
                            <article class="card-body">
                                <h6 class="card-title">
                                    Quiz de filosofia bla bla bla
                                    <span class="badge bg-success">
                                    </span>
                                </h6>
                                <p class="card-text text-actividad text-black">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </article>
                        </section>
                        <section class="card text-black mb-3 shadow">
                            <article class="card-body">
                                <h6 class="card-title">
                                    Quiz de filosofia
                                    <span class="badge bg-success">
                                        26/02/1998
                                    </span>
                                </h6>
                                <p class="card-text text-actividad text-black">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </article>
                        </section>
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
                                <tbody class="text-center ">
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <a href="">
                                                Michael Alexis Chacón Marin
                                            </a>
                                        </td>
                                        <td>
                                            <span class="form-check">
                                                <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="">
                                                </input>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Briand Jhoann Porras Vargas
                                        </td>
                                        <td>
                                            <span class="form-check">
                                                <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="">
                                                </input>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                Cerrar
                            </button>
                            <button class="btn btn-outline-success" type="button">
                                Registrar
                            </button>
                        </div>
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
                        <form action="#" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">
                                                Título de la actividad:
                                            </label>
                                            <input class="form-control" id="exampleFormControlInput1" placeholder="Actividad" required="" type="text">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">
                                                Fecha de la actividad:
                                            </label>
                                            <input class="form-control" id="exampleFormControlInput1" type="date">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlTextarea1">
                                        Descripción:
                                    </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">
                                    </textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                    Cerrar
                                </button>
                                <button class="btn btn-outline-success" type="button">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Modal para adjuntar documentos -->
            <article aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="subirDocumentos" tabindex="-1">
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
