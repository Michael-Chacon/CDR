<!-- contenido de  la pagina -->
                <!-- inicio del contenedor -->

                <section class="container-fluid">
                    <section class="row shadow titulo">
                        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            <h1 class="text-center config">
                                Grados
                            </h1>
                        </article>
                        <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                            <a data-bs-target="#CreatGrado" data-bs-toggle="modal"  type="button">
                                <i class="bi bi-plus-lg efecto_hover" style="font-size: 2rem; color: white;">
                                </i>
                            </a>
                        </article>
                    </section>
                   <!-- alerta al crear el grado -->
                <?php echo Utils::getAlert(); ?>
                <?php Utils::borrar_error('alert')?>
                    <section class="row">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-xl-12 mt-3">
                            <article class="row">
                                <?php if (isset($datos) && $datos->rowCount() != 0):
                                while ($grados = $datos->fetchObject()): ?>
                                   <article class="col-xs-12 col-sm-6 col-md-3 col-xl-3 mb-2">
                                    <div class="card text-center shadow option">
                                       <div class="card-body contenido-card">
                                          <h2 class="mt-2 grados">
                                             <?=$grados->nombre_g?>
                                         </h2>
                                         <hr class="hr-perfil"/>
                                         <a class="stretched-link" href="<?=base_url?>Materias/vista&id_grado=<?=Utils::encryption($grados->id)?>">
                                         </a>
                                     </div>
                                 </div>
                             </article>
                         <?php endwhile;?>
                     <?php else: ?>
                        <div class="alert alert-danger text-center" role="alert">
                            No hay grados regostrados.
                        </div>
                    <?php endif;?>
                            </article>
                        </article>
                    </section>
                    <a type="button"  class="btn btn-success " href="<?=base_url?>Pdf/pdf">PDF</a>
                </section>
                <!-- fin del contenedor -->
                <!-- ================================================
            ====================MODALES===================
            ===============================================-->
        <!-- Modal crear grado-->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="CreatGrado" tabindex="-1">
            <section class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Crea un nuevo grado
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="<?=base_url?>Grado/guardarGrado" method="post">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="grado" name="grado" placeholder="Grado" type="number" required="">
                                    <label for="grado">
                                        Grado:
                                    </label>
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal" type="button">
                                Cancelar
                            </button>
                            <button class="btn btn-primary" type="submit">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </section>
