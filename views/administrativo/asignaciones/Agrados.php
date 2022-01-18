<!--inicio del contenedor -->
                <section class="container-fluid">
                    <?php echo Utils::general_alerts('eliminar_asignacion_grado', 'Los grados se ha des asignado con éxito.', 'Algo salió mal al des asignar los grados, inténtelo de nuevo.');
                    Utils::borrar_error('eliminar_asignacion_grado'); ?>
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
                                    <?php if (!empty($listado)):
                                            while ($grados = $listado->fetchObject()): ?>
		                                        <h3>
		                                            <li class="list-group-item">
		                                                <input aria-label="..." class="form-check-input me-1" type="checkbox" value="<?=$grados->id?>" name="grados[<?=$grados->id?>]">
		                                                    <?=$grados->nombre_g?>
		                                                </input>
		                                            </li>
		                                        </h3>
		                                    <?php endwhile;
                                    endif;?>
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
                                        <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay grados asignados.</span></p>
                                        <?php endif;?>
                                </ul>
                            </form>
                        </article>
                    </section>
                </section>
                <!-- fin del contenedor