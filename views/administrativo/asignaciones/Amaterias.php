<!-- inicio del contenedor -->
                <section class="container-fluid">
                      <section class="row shadow titulo">
                        <article class="col-xs-12col-sm-12col-md-12 col-lg-12">
                            <h1 class="text-center config">
                                Asignacion de materias al docente
                            </h1>
                        </article>
                    </section>
                    <h2 class="text-center">
                    </h2>
                    <section class="row justify-content-center mt-5">
                        <article class="col-xs-12 col-sm-12 col-md-4   col-lg-4 mb-4">
                    <?php echo Utils::general_alerts('materiaDocente', 'Materias asignadas.', 'en la asignación de las materias.'); ?>
                    <?php Utils::borrar_error('materiaDocente');?>
                            <form action="<?=base_url?>Asignaciones/registrarMateriasADocente" method="post">
                                <input type="" hidden="" name="docente" value="<?=$id_docente?>">
                                <input type="" hidden="" name="grado" value="<?=$_GET['id_grado']?>">
                                <input type="" hidden="" name="nombre" value="<?=$_GET['nombre']?>">
                                <div class="card shadow">
                                        <h3 class="card-title text-center mt-2">
                                             Grado <?=$nombre?>
                                        </h3>
                                        <small class="text-center subtexto">Materias sin asignar</small>
                                        <hr>
                                    <div class="card-body">
                                        <ul class="list-group ">
                                            <?php if($lista_m->rowCount() == 0): ?>
                                                <div class="alert alert-danger text-center" role="alert">
                                                    No hay materias disponibles.
                                                </div>
                                            <?php else: ?>
                                                <?php while ($materias = $lista_m->fetchObject()): ?>
                                                    <h5>
                                                        <li class="list-group-item">
                                                            <input aria-label="..." class="form-check-input me-1" type="checkbox" value="<?=$materias->id?>" name="materias[<?=$materias->id?>]">
                                                                <i class="bi <?=$materias->icono?>">
                                                                </i>
                                                                    <?=$materias->nombre_mat?>
                                                            </input>
                                                        </li>
                                                    </h5>
                                                <?php endwhile?>
                                            <button class="btn btn-success mt-3 btn-lg" type="submit">Asignar</button>
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </article>
                       <article class="col-xs-12 col-sm-12 col-md-4  col-lg-4 ">
                        <?php echo Utils::general_alerts('DesasignarMateriaDocente', 'Materias retirada con éxito', 'en la desasignación de las materias.'); ?>
                        <?php Utils::borrar_error('DesasignarMateriaDocente');?>
                            <div class="card shadow">
                                    <h3 class="card-title text-center mt-2">
                                        Materias ya asignadas
                                    </h3>
                                    <hr>
                                <div class="card-body">
                            <form action="<?=base_url?>Asignaciones/desasignarMateriaHaDocentes" method="post">
                                     <input type="" hidden="" name="docente" value="<?=$id_docente?>">
                                    <input type="" hidden="" name="grado" value="<?=$_GET['id_grado']?>">
                                    <input type="" hidden="" name="nombre" value="<?=$_GET['nombre']?>">
                                    <ul class="list-group ">
                                        <?php if($listado_materias->rowCount() == 0): ?>
                                            <div class="alert alert-danger text-center" role="alert">
                                                No hay materias asignadas
                                            </div>
                                        <?php else: ?>
                                        <?php while ($materias_asignadas = $listado_materias->fetchObject()): ?>
                                            <h5>    
                                                <li class="list-group-item">
                                                    <input aria-label="..." class="form-check-input me-1" type="checkbox" value="<?=$materias_asignadas->id_materia?>" name="asignadas[<?=$materias_asignadas->id_materia?>]">
                                                        <i class="bi   <?=$materias_asignadas->icono;?>"></i>
                                                        <?=$materias_asignadas->nombre_mat;?>
                                                </li>
                                            </h5>
                                       <?php endwhile?>
                                       <button class="btn btn-danger mt-3 btn-lg" type="submit">Desasignar</button>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                            </form>
                        </article>
                    </section>
                </section>
                <!-- fin del contenedor -->