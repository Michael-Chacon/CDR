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
                <article class="col-md-5 mt-5">
                    <ul class="list-group list-group-flush shadow">
                        <li class="list-group-item">
                            <span class="nombre_estudiante">
                                <?=$estudiante->nombre_e?> <?=$estudiante->apellidos_e?>
                                <span class="badge rounded-pill bg-danger">
                                    <?=$fallas->total?> fallas
                                </span>
                            </span>
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
                <article class="col-md-5 mt-4 ">
                    <h6 class="text-center">
                        Fallas
                    </h6>
                        <?php $f = 0;
                        if($fechas_fallas->rowCount() != 0): 
                        ?>
                            <div>
                                <table class="table text-center shadow">
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
                            </div>
                    <?php else: ?>
                        <p class="text-center mt-3"><span class="badge bg-warning text-dark">Este estudiante no tiene fallas.</span></p>
                    <?php endif;?>
                </article>
            </section>
            <!-- fin indicador y contenido -->
            <section class="row justify-content-center mt-5">
                <h5 class="text-center">
                    Notas
                </h5>
                <article class="col-md-5 mt-3 mb-3 ">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Primer periodo
                            </caption>
                            <thead>
                                <tr>
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
                                <tr>
                                    <td>
                                        Cognitiva
                                    </td>
                                    <td>
                                        40
                                    </td>
                                    <td>
                                        15%
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
                                <tr>
                                    <td>
                                        Ludica
                                    </td>
                                    <td>
                                        45
                                    </td>
                                    <td>
                                        10%
                                    </td>
                                    <td>
                                        <i class="bi bi-pen">
                                        </i>
                                    </td>
                                    <td>
                                        <a class="icono-actividades" download="" href="#">
                                            <i class="bi bi-trash" style="font-size: 1.2rem;">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
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
                        </table>
                    </div>
                </article>
                <article class="col-md-5 mt-3 mb-3">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Segundo periodo
                            </caption>
                            <thead>
                                <tr>
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
                                <tr>
                                    <td>
                                        Cognitiva
                                    </td>
                                    <td>
                                        40
                                    </td>
                                    <td>
                                        15%
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
                                <tr>
                                    <td>
                                        Ludica
                                    </td>
                                    <td>
                                        45
                                    </td>
                                    <td>
                                        10%
                                    </td>
                                    <td>
                                        <i class="bi bi-pen">
                                        </i>
                                    </td>
                                    <td>
                                        <i class="bi bi-trash">
                                        </i>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
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
                        </table>
                    </div>
                </article>
                <article class="col-md-5 mt-3 mb-3 ">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Tercer periodo
                            </caption>
                            <thead>
                                <tr>
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
                                <tr>
                                    <td>
                                        Cognitiva
                                    </td>
                                    <td>
                                        40
                                    </td>
                                    <td>
                                        15%
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
                                <tr>
                                    <td>
                                        Ludica
                                    </td>
                                    <td>
                                        45
                                    </td>
                                    <td>
                                        10%
                                    </td>
                                    <td>
                                        <i class="bi bi-pen">
                                        </i>
                                    </td>
                                    <td>
                                        <i class="bi bi-trash">
                                        </i>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
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
                        </table>
                    </div>
                </article>
                <article class="col-md-5 mt-3 mb-3">
                    <div>
                        <table class="table text-center caption-top shadow">
                            <caption class="text-center">
                                Cuarto periodo
                            </caption>
                            <thead>
                                <tr>
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
                                <tr>
                                    <td>
                                        Cognitiva
                                    </td>
                                    <td>
                                        40
                                    </td>
                                    <td>
                                        15%
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
                                <tr>
                                    <td>
                                        Ludica
                                    </td>
                                    <td>
                                        45
                                    </td>
                                    <td>
                                        10%
                                    </td>
                                    <td>
                                        <i class="bi bi-pen">
                                        </i>
                                    </td>
                                    <td>
                                        <i class="bi bi-trash">
                                        </i>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
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
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">
                                ¿Qué se evalúa?
                            </label>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="Taller, Tarea, Evaluación, etc" type="text">
                            </input>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">
                                        Nota:
                                    </label>
                                    <input class="form-control" id="exampleFormControlInput1" placeholder="45" type="number">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">
                                        Porcentaje:
                                    </label>
                                    <input class="form-control" id="exampleFormControlInput1" placeholder="20" type="number">
                                    </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                            Cancelar
                        </button>
                        <button class="btn btn-outline-success" type="button">
                            Registrar nota
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- fin de nueva nota -->
        <!-- fin del contenido -->