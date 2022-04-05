<!-- inicio -->
        <section class="container-fluid">
            <section class="row shadow titulo">
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="text-center config">
                        Materias a mi cargo en <strong><?=$nombre_grado?>°</strong>
                    </h1>
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
                            <a class="stretched-link" href="<?=base_url?>PanelMateria/homeMateria&ide=<?=Utils::encryption($materia->id_materia)?>&name=<?=$materia->nombre_mat?>&degree=<?=Utils::encryption($id_grado)?>&nombreg=<?=$nombre_grado?>">
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
