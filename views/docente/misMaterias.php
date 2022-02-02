<!-- inicio -->
        <section class="container-fluid">
            <section class="row shadow titulo">
                <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <h1 class="text-center config">
                        Materias a mi cargo en <strong><?=$nombre_grado?>°</strong>
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
                                <a class="dropdown-item" data-bs-target="#CreatGrado" data-bs-toggle="modal" href="#">
                                    <i class="bi bi-book-half">
                                    </i>
                                    Crear materia
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-target="#CreatHorario" data-bs-toggle="modal" href="#">
                                    <i class="bi bi-calendar-week">
                                    </i>
                                    Asignar horario
                                </a>
                            </li>
                            <!-- <li><a class="dropdown-item" href="#">Menu item</a></li> -->
                        </ul>
                    </acticle>
                </article>
            </section>
        </section>
        <section class="container-fluid">
            <article class="row justify-content-center mt-5">
                <?php if ($allMaterias->rowCount() != 0): ?>
                    <?php while ($materia = $allMaterias->fetchObject()): ?>
                <article class="col-xs-12 col-sm-6 col-md-3 col-xl-3 mb-2">
                    <div class="card text-center shadow option">
                        <div class="card-body contenido-card mis_materias">
                            <i class="bi bi-calculator-fill" style="font-size: 1.5rem;">
                            </i>
                            <hr class="hr-perfil"/>
                            <h6 class="mt-2">
                                <?=$materia->nombre_mat?>
                            </h6>
                            <a class="stretched-link" href="<?=base_url?>PanelMateria/homeMateria&ide=<?=$materia->id_materia?>&name=<?=$materia->nombre_mat?>&degree=<?=$id_grado?>&nombreg=<?=$nombre_grado?>">
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile;?>
            <?php else: ?>
                <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
            <?php endif;?>
            </article>
        </section>
