<section class="container-fluid">
    <section class="row shadow titulo">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center config">
                Habilitar boletín
            </h1>
        </article>
    </section>
    <?php echo Utils::general_alerts('cambiarEstadoBoletin', 'El estado del boletín fue actualizado con éxito', 'Algo salió mal al intentar actualizar el estado del boletín, inténtelo de nuevo.'); ?>
    <?php Utils::borrar_error('cambiarEstadoBoletin');?>
    <section class="row justify-content-center mt-5">
        <article class="col-md-4">
            <div class="card mb-3 shadow">
                <div class="card-body text-dark">
                    <form action="<?=base_url?>Configuracion/cambiarEstadoBoletin" method="post">
                        <?php if ($estado->estado == 'Deshabilitado'): ?>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-2 shadow">
                                <div class="form-check form-switch">
                                    <input class="form-check-input " id="flexSwitchCheckChecked" name="estado" type="checkbox">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg" type="submit">
                                Habilitar el boletín
                            </button>
                        </div>
                        <?php elseif ($estado->estado == 'Habilitado'): ?>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-2 shadow">
                                <div class="form-check form-switch">
                                    <input checked="" class="form-check-input" id="flexSwitchCheckChecked" name="estado" type="checkbox">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-danger btn-lg" type="submit">
                                Deshabilitar el boletín
                            </button>
                        </div>
                        <?php endif;?>
                    </form>
                    <?php if ($estado->estado == 'Deshabilitado'): ?>
                    <p class="card-text text-center mt-3 boletin-texto">
                        El boletín está
                        <strong>
                            deshabilitado
                        </strong>
                        , al habilitarlo, los docentes en cada materia podrán subir al  boletín las notas finales de cada estudiante
                    </p>
                    <?php else: ?>
                    <p class="card-text text-center mt-3 boletin-texto">
                        El boletín está
                        <strong>
                            habilitado
                        </strong>
                        al deshabilitar, los docentes ya no podrán subir al boletín las notas finales de cada estudiante,
                    </p>
                </div>
                <?php endif;?>
            </div>
        </article>
    </section>
</section>
