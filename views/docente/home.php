<!-- contenido de  la pagina -->
            <section class="container-fluid">
                <section class="row shadow titulo mb-3">
                    <article class="col-xs-11 col-sm-11 col-md-12 col-lg-11">
                        <h1 class="text-center config">
                            Panel principal
                        </h1>
                    </article>
                </section>
            </section>
            <section class="container-fluit">
                <section class="row justify-content-center">
                    <h3 class="text-center mt-2 mb-5">
                        Grados
                    </h3>
                    <?php if ($mis_grados->rowCount() != 0): ?>
                        <?php while ($grado = $mis_grados->fetchObject()): ?>
                    <article class="col-xs-12 col-sm-4 col-md-2 col-xl-2 mb-2">
                        <article class="card text-center shadow option">
                            <div class="card-body contenido-card">
                                <h2 class="mt-2 grados">
                                    <?=$grado->nombre_g?>°
                                </h2>
                                <hr class="hr-perfil"/>
                                <a class="stretched-link" href="<?=base_url?>MisMaterias/misMaterias&grado=<?=$grado->id?>&nombre=<?=$grado->nombre_g?>">
                                </a>
                            </div>
                        </article>
                    </article>
                <?php endwhile;?>
                <?php else: ?>
                   <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay grados asignadas.</span></p>
                <?php endif;?>
                </section>
                <hr/>
                <!-- horario -->
                <section class="row">
                    <h3 class="text-center mb-5">Horario</h3>
                    <article class="col-md-4 text-center">
                        <span class="dia">
                            Lunes
                        </span>
                        <?php if ($dia_lunes->rowCount() > 0): ?>
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
                                    <?php while ($lunes = $dia_lunes->fetchObject()): ?>
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
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <p class="text-center mt-3">
                                <span class="badge bg-warning text-dark">
                                    No tienes clases.
                                </span>
                            </p>
                            <?php endif;?>
                        </div>
                    </article>
                    <article class="col-md-4 text-center">
                        <span class="dia">
                            Martes
                        </span>
                        <?php if ($dia_martes->rowCount() > 0): ?>
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
                                    <?php while ($martes = $dia_martes->fetchObject()): ?>
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
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <p class="text-center mt-3">
                            <span class="badge bg-warning text-dark">
                                No tienes clases.
                            </span>
                        </p>
                        <?php endif;?>
                    </article>
                    <article class="col-md-4 text-center">
                        <span class="dia">
                            Miercoles
                        </span>
                        <?php if ($dia_miercoles->rowCount() > 0): ?>
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
                                    <?php while ($miercoles = $dia_miercoles->fetchObject()): ?>
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
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <p class="text-center mt-3">
                            <span class="badge bg-warning text-dark">
                                No tienes clases.
                            </span>
                        </p>
                        <?php endif;?>
                    </article>
                    <article class="col-md-4 text-center">
                        <span class="dia">
                            Jueves
                        </span>
                        <?php if ($dia_jueves->rowCount() > 0): ?>
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
                                    <?php while ($jueves = $dia_jueves->fetchObject()): ?>
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
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <p class="text-center mt-3">
                            <span class="badge bg-warning text-dark">
                                No tienes clases.
                            </span>
                        </p>
                        <?php endif;?>
                    </article>
                    <article class="col-md-4 text-center">
                        <span class="dia">
                            Viernes
                        </span>
                        <?php if ($dia_viernes->rowCount() > 0): ?>
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
                                    <?php while ($viernes = $dia_viernes->fetchObject()): ?>
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
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <p class="text-center mt-3">
                            <span class="badge bg-warning text-dark">
                                No tienes clases.
                            </span>
                        </p>
                        <?php endif;?>
                    </article>
                </section>
                <!-- fin del horario -->
                <hr/>
                <section class="row mt-3 mb-5">
                    <h3 class="text-center mb-5">Menu</h3>
                    <!-- <article class="col-xs-12 col-sm-12 col-md-4 col-xl-4 mb-2">
                        <div class="card text-center shadow option">
                            <div class="card-body contenido-card">
                                   <i class="bi bi-file-earmark-arrow-down" style="font-size: 3rem;"></i>
                                <h5>
                                    Documentos
                                </h5>
                                <a class="stretched-link" href="<?=base_url?>Teacher/documentos">
                                </a>
                            </div>
                        </div>
                    </article>
                    <article class="col-xs-12 col-sm-12 col-md-4 col-xl-4 mb-2">
                        <div class="card text-center shadow option">
                            <div class="card-body contenido-card">
                                   <i class="bi bi-calendar-range" style="font-size: 3rem;"></i>
                                <h5>
                                    Periodos
                                </h5>
                                <a class="stretched-link" href="<?=base_url?>Periodo/vista_config">
                                </a>
                            </div>
                        </div>
                    </article> -->
                     <article class="col-xs-12 col-sm-12 col-md-4 col-xl-4 mb-2">
                        <div class="card text-center shadow option">
                            <div class="card-body contenido-card">
                                   <span class="" style="font-size: 3rem;"><?=$mi_grado->nombre_g?>°</span>
                                <h5>
                                    Grado a mi cargo
                                </h5>
                                <a class="stretched-link" href="<?=base_url?>Materias/vista&id_grado=<?=$mi_grado->id?>">
                                </a>
                            </div>
                        </div>
                    </article>
                </section>
            </section>
