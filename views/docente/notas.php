<!-- inicio del contenido -->
        <section class="container-fluid">
            <section class="row shadow titulo">
                <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <h1 class="text-center config">
                        <i class="bi <?=$materia->icono?>"></i>
                        <?=$materia->nombre_mat?> <?=$grado?>°
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
                                <a class="dropdown-item" data-bs-target="#newNote" data-bs-toggle="modal" href="#">
                                    <i class="bi bi-book-half">
                                    </i>
                                    Nueva nota
                                </a>
                            </li>
                        </ul>
                    </acticle>
                </article>
            </section>
            <!-- fin del header -->
            <section class="row justify-content-center">
                <?php echo Utils::general_alerts('registrarNota', 'Nota registrada con éxito.', ' El porcentaje de esta nota sobrepasa el límite del 100%') ?>
                <?php Utils::borrar_error('registrarNota'); ?>
                <article class="col-md-5 mt-5">
                    <ul class="list-group list-group-flush shadow">
                        <li class="list-group-item">
                            <article class="row">
                                <article class="col-md-10">
                            <span class="nombre_estudiante">
                                <?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
                            </span>
                                </article>
                                <article class="col-md-2">
                                <span class="badge rounded-pill bg-danger">
                                    <?=$fallas->total?> fallas
                                </span>
                                </article>
                            </article>
                        </li>
                        <li class="list-group-item">
                            <h6>
                                Indicadores de la materia:
                            </h6>
                            <small>
                                <?=$materia->indicadores_mat?>
                            </small>
                        </li>
                    </ul>
                </article>
                <article class="col-md-5 mt-5 ">
                    <!-- inicio acordeon -->
                    <div class="accordion accordion-flush shadow" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button aria-controls="flush-collapseOne" aria-expanded="false" class="accordion-button collapsed text-center" data-bs-target="#flush-collapseOne" data-bs-toggle="collapse" type="button">
                                    <span class="registro-fallas">Registro de inasistencias</span>
                                </button>
                            </h2>
                            <div aria-labelledby="flush-headingOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" id="flush-collapseOne">
                                <article class="accordion-body">
                                    <?php $f = 0;
                                        if($fechas_fallas->rowCount() != 0): 
                                    ?>
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Fecha
                                                    </th>
                                                    <th>
                                                        Periodo
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($fechas = $fechas_fallas->fetchObject()): 
                                                    $f++;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?=$f?>
                                                        </td>
                                                        <td>
                                                            <?=$fechas->fecha_falla?>
                                                        </td>
                                                        <td>
                                                            <?=$fechas->id_periodo_f?>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>    
                                            </tbody>
                                            </table>
                                    <?php else: ?>
                                        <p class="text-center mt-3"><span class="badge bg-warning text-dark">Este estudiante no tiene fallas.</span></p>
                                    <?php endif;?>
                                    </table>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- fin del acordeon -->
                </article>
            </section>
            <!-- fin indicador y contenido -->
            <section class="row justify-content-center mt-5">
                <h5 class="text-center">
                    Notas
                </h5>
                <article class="col-md-6 mt-3 mb-3 ">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Primer periodo
                            </caption>
                            <?php if($periodo1->rowCount() != 0): 
                                $n = 1;
                            ?>
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Nota
                                        </th>
                                        <th>
                                            Porcentaje
                                        </th>
                                        <th>
                                            Editar
                                        </th>
                                        <th>
                                            Eliminar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($uno = $periodo1->fetchObject()): ?>
                                    <tr>
                                        <td>
                                            <?=$n++;?>
                                        </td>
                                        <td>
                                            <?=$uno->area?>
                                        </td>
                                        <td>
                                            <?=$uno->nota?>
                                        </td>
                                        <td>
                                            <?=$uno->porcentaje?>%
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-pen">
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-trash" style="font-size: 1.2rem;">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>
                                            Total
                                        </th>
                                        <th>
                                            50
                                        </th>
                                        <th>
                                            100%
                                        </th>
                                    </tr>
                                </tfoot>
                            <?php else: ?>
                                <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay notas registradas.</span></p>
                            <?php endif; ?>
                        </table>
                    </div>
                </article>
                <article class="col-md-6 mt-3 mb-3">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Segundo periodo
                            </caption>
                            <?php if($periodo2->rowCount() != 0):
                                $n = 1;
                            ?>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Nota
                                    </th>
                                    <th>
                                        Porcentaje
                                    </th>
                                    <th>
                                        Editar
                                    </th>
                                    <th>
                                        Eliminar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($dos = $periodo2->fetchObject()): ?>
                                    <tr>
                                        <td>
                                            <?=$n++;?>
                                        </td>
                                        <td>
                                            <?=$dos->area?>
                                        </td>
                                        <td>
                                            <?=$dos->nota?>
                                        </td>
                                        <td>
                                            <?=$dos->porcentaje?>%
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-pen">
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-trash" style="font-size: 1.2rem;">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        50
                                    </th>
                                    <th>
                                        100%
                                    </th>
                                </tr>
                            </tfoot>
                            <?php else: ?>
                                <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay notas registradas.</span></p>
                            <?php endif; ?>
                        </table>
                    </div>
                </article>
                <article class="col-md-5 mt-3 mb-3 ">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Tercer periodo
                            </caption>
                          <?php if($periodo3->rowCount() != 0):
                                $n = 1;
                            ?>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Nota
                                    </th>
                                    <th>
                                        Porcentaje
                                    </th>
                                    <th>
                                        Editar
                                    </th>
                                    <th>
                                        Eliminar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($tres = $periodo3->fetchObject()): ?>
                                    <tr>
                                        <td>
                                            <?=$n++;?>
                                        </td>
                                        <td>
                                            <?=$tres->area?>
                                        </td>
                                        <td>
                                            <?=$tres->nota?>
                                        </td>
                                        <td>
                                            <?=$tres->porcentaje?>%
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-pen">
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-trash" style="font-size: 1.2rem;">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        50
                                    </th>
                                    <th>
                                        100%
                                    </th>
                                </tr>
                            </tfoot>
                            <?php else: ?>
                                <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay notas registradas.</span></p>
                            <?php endif; ?>
                        </table>
                    </div>
                </article>
                <article class="col-md-5 mt-3 mb-3">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Cuarto periodo
                            </caption>
                            <?php if($periodo4->rowCount() != 0):
                                $n = 1;
                            ?>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Nota
                                    </th>
                                    <th>
                                        Porcentaje
                                    </th>
                                    <th>
                                        Editar
                                    </th>
                                    <th>
                                        Eliminar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($cuatro = $periodo4->fetchObject()): ?>
                                    <tr>
                                        <td>
                                            <?=$n++;?>
                                        </td>
                                        <td>
                                            <?=$cuatro->area?>
                                        </td>
                                        <td>
                                            <?=$cuatro->nota?>
                                        </td>
                                        <td>
                                            <?=$cuatro->porcentaje?>%
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-pen">
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="icono-actividades" download="" href="#">
                                                <i class="bi bi-trash" style="font-size: 1.2rem;">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        50
                                    </th>
                                    <th>
                                        100%
                                    </th>
                                </tr>
                            </tfoot>
                            <?php else: ?>
                                <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay notas registradas.</span></p>
                            <?php endif; ?>
                        </table>
                    </div>
                </article>
            </section>
        </section>
        <!-- Modal -->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="newNote" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Asignar nueva nota
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="<?=base_url?>Notas/registrarNota" method="post">
                        <input type="number" hidden name="estudiante"  value="<?=$estudiante->id?>">
                        <input type="text" hidden name="materia" value="<?=$materia->id?>">
                        <input type="number" hidden name="grado" value="<?=$grado?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="item">
                                    ¿Qué se evalúa?
                                </label>
                                <input class="form-control" id="item" placeholder="Taller, Tarea, Evaluación, etc" type="text" name="item" required>
                                </input>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nota">
                                            Nota:
                                        </label>
                                        <input class="form-control" id="nota" placeholder="45" type="number" name="nota" required>
                                        </input>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="porcentaje">
                                            Porcentaje:
                                        </label>
                                        <input class="form-control" id="porcentaje" placeholder="20" type="number" name="porcentaje" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                Cancelar
                            </button>
                            <button class="btn btn-outline-success" type="submit">
                                Registrar nota
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- fin de nueva nota -->
        <!-- fin del contenido -->