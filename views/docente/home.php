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
            <section class="container-fluid">
                <main class="row">
                    <section class="col-md-9">

                <section class="row">
                    <h3 class="text-center mt-2 mb-5">
                        Grados
                    </h3>
                    <?php if ($mis_grados->rowCount() != 0): ?>
                        <?php while ($grado = $mis_grados->fetchObject()): ?>
                    <article class="col-xs-12 col-sm-4 col-md-2 col-lg-3 col-xl-3 mb-2">
                        <article class="card text-center shadow option">
                            <div class="card-body contenido-card">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="mt-2 grados">
                                            <?=$grado->nombre_g?>°
                                        </span>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="row">
                                            <small>(<?=$grado->nombre?>)</small>
                                        </div>
                                        <div class="row">
                                            <span class="aula">aula</span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr-perfil"/>
                                <a class="stretched-link" href="<?=base_url?>MisMaterias/misMaterias&grado=<?=Utils::encryption($grado->id)?>&nombre=<?=$grado->nombre_g?>">
                                </a>
                            </div>
                        </article>
                    </article>
                <?php endwhile;?>
                <?php else: ?>
                    <section class="row justify-content-center">
                        <article class="col-md-6">
                            <div class="alert alert-danger text-center" role="alert">
                             No hay grados asignadas.
                         </div>
                     </article>
                   </section>
                <?php endif;?>
                </section>
                <hr/>
                <!-- horario -->
                <section class="row">
                    <h3 class="text-center mb-5">Horario</h3>
                    <article class="col-md-6 text-center">
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
                                <div class="alert alert-danger text-center" role="alert">
                                    No tienes clases.
                                </div>
                            <?php endif;?>
                        </div>
                    </article>
                    <article class="col-md-6 text-center">
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
                           <div class="alert alert-danger text-center" role="alert">
                            No tienes clases.
                        </div>
                        <?php endif;?>
                    </article>
                    <article class="col-md-6 text-center">
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
                           <div class="alert alert-danger text-center" role="alert">
                            No tienes clases.
                        </div>
                        <?php endif;?>
                    </article>
                    <article class="col-md-6 text-center">
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
                           <div class="alert alert-danger text-center" role="alert">
                            No tienes clases.
                        </div>
                        <?php endif;?>
                    </article>
                    <article class="col-md-6 text-center">
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
                           <div class="alert alert-danger text-center" role="alert">
                            No tienes clases.
                        </div>
                        <?php endif;?>
                    </article>
                </section>
                <!-- fin del horario -->
                <hr/>
                <!-- Menú de opciones -->
                <section class="row mt-3 mb-5">
                    <h3 class="text-center mb-5">Menu</h3>
                     <article class="col-xs-12 col-sm-12 col-md-4 col-xl-4 mb-2">
                        <div class="card text-center shadow option">
                            <div class="card-body contenido-card">
                                   <span class="" style="font-size: 3rem;"><?=$nombre_grado?></span>
                                <h5>
                                    Grado a mi cargo
                                </h5>
                                <a class="<?=$clase?>" href="<?=base_url?>Materias/vista&id_grado=<?=Utils::encryption($id_grado)?>">
                                </a>
                            </div>
                        </div>
                    </article>
                </section>
                    </section>
                    <section class="col-md-3">
                        <span class="valor_item text-center">Tablero de actividades</span>
                        <?php if ($actividades_docentes->rowCount() != 0): ?>
                            <?php while ($actividad = $actividades_docentes->fetchObject()): ?>
                                <div class="card shadow mt-3 mb-3" style="border-left: 6px solid <?=$actividad->color?> !important;">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-1 "><?=ucfirst($actividad->titulo)?></h6>
                                        <p class="mt-0 haceTiempo">Publicado <?=Utils::difernciaParaHumanos($actividad->fechaRegistro)?></p>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#info_estudiante<?=$actividad->id?>"  aria-expanded="false" aria-controls="info">Detalles de la actividad
                                            </a>
                                        </div>
                                        <div class="collapse multi-collapse mt-3" id="info_estudiante<?=$actividad->id?>">
                                            <hr style="border: 1px solid <?=$actividad->color?>!important;">
                                            <span class="textoActividad"><?=$actividad->detalle?></span>
                                            <h6 class="titulo-menu text-center mt-2">
                                                <small><?=Utils::fechaCarbon($actividad->fecha)?></small>
                                            </h6>
                                            <p class="subtexto text-center">Fecha actividad</p></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;?>
                            <span class="d-grid gap-2 p-3">
                                <a  href="<?=base_url?>Tablero/verActividades&user=<?=Utils::encryption("docente")?>" type="button" class="btn btn-outline-primary position-relative btn-sm">
                                    Ver todas las actividades<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+<?=$total_actividades->countActivityes - 4?> <span class="visually-hidden">unread messages</span></span>
                                </a>
                            </span>
                        <?php else: ?>
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    No hay actividades en el tablero.
                                </div>
                            </div>
                        <?php endif;?>
                    </section>
                </main>
            </section>
