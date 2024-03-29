<!--inicio del contenedor -->
                <section class="container-fluid">
                    <?php echo Utils::getAlert();
                    Utils::borrar_error('alert'); ?>
                    <section class="row shadow titulo">
                        <article class="col-xs-12col-sm-12col-md-12 col-lg-12">
                            <h1 class="text-center config">
                                Grados
                            </h1>
                        </article>
                    </section>
                    <h2 class="text-center">
                    </h2>
                    <section class="row justify-content-center">
                        <article class="col-6">
                            <form action="<?=base_url?>Asignaciones/registrarGrados" method="post">
                                <input type="hidden" name="id_docente"  value="<?=$_GET['id_docente']?>">
                                <ul class="list-group shadow text-center">
                                    <?php if (!empty($listado) && $listado->rowCount() != 0):
                                            while ($grados = $listado->fetchObject()): ?>
		                                        <h3>
		                                            <li class="list-group-item">
		                                                <input aria-label="..." class="form-check-input me-1" type="checkbox" value="<?=$grados->id?>" name="grados[<?=$grados->id?>]">
		                                                    <?=$grados->nombre_g?>
		                                                </input>
		                                            </li>
		                                        </h3>
		                                    <?php endwhile;?>
                                        <?php else: ?>
                                            <div class="alert alert-danger" role="alert">
                                                No hay grados disponibles
                                          </div>
                                    <?php endif;?>
                                <button class="btn btn-success btn-lg" type="submit">Guardar</button>
                                </ul>
                            </form>
                        </article>
                        <article class="col-6 text-center">
                            <form action="<?=base_url?>Asignaciones/desasignarGrados" method="post">
                                <input type="hidden" name="id_docente"  value="<?=$_GET['id_docente']?>">
                                <ul class="list-group shadow text-center">
                                <h2>Grados ya asignados</h2>
                                    <?php if ($asignados->rowCount() != 0):
                                            while ($grados = $asignados->fetchObject()): ?>
                                                <h3>
                                                    <li class="list-group-item">
                                                        <input aria-label="..." class="form-check-input me-1" type="checkbox" value="<?=$grados->id?>" name="grados[<?=$grados->id?>]">
                                                                <?=$grados->nombre_g?>
                                                        </input>
                                                    </li>
                                                </h3>
                                            <?php endwhile;?>
                                        <button class="btn btn-danger btn-lg" type="submit">Des asignar</button>
                                    <?php else: ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            No hay grados asignados. <strong>Recuerde que antes de asignar grados a los docentes usted debe asignar aulas a los grados, de lo contrario no se mostraran los grados asignados a los docentes.</strong>
                                        </div>
                                        <?php endif;?>
                                </ul>
                            </form>
                        </article>
                    </section>
                    <div class="alert alert-warning alert-dismissible fade show mt-3 text-center" role="alert">
                        Recuerde que antes de asignar grados a los docentes usted debe <strong>asignar aulas a los grados</strong>, de lo contrario no se mostraran los grados asignados a los docentes.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </section>
                <!-- fin del contenedor