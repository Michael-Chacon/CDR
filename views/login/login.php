<div class="area " style="background-image: url(<?=base_url?>helpers/img/back.jpg);">
            <section class="container">
                <section class="row justify-content-center">
                    <article class="col-xs-12 col-sm-12 col-md-7 col-lg-7 login">
                        <div class="card borde">
                            <div class="contenedor">
                                <img alt="colegio" class="card-img-top img-portada-login" src="<?=base_url?>helpers/img/col.png"/>
                                <!-- <div class="centrado">INSTITUTO EDUCATIVO CONCENTRACIÓN DE DESARROLLO RURAL CDR </div> -->
                            </div>
                            <div class="card-body">
                                <h1 class="card-title text-center mb-4">
                                    Inicio de sesion
                                </h1>
                                <?php  echo Utils::general_alerts('cambiarPassA', 'Cambiaste la contraseña con éxito.', 'Algo salió mal al actualizar la contraseña.'); ?>
                                <?php if (isset($_SESSION['error_login'])): ?>
	                                <div class="row justify-content-center">
	                                    <div class="col-md-9">
	                                        <div class="alert  alert-dismissible fade show text-center error-login" role="alert">
	                                          <strong><?=$_SESSION['error_login']?></strong>
	                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	                                        </div>
	                                    </div>
	                                </div>
	                            <?php endif;?>
                            <?php Utils::borrar_error('error_login');
                                        Utils::borrar_error('cambiarPassA');?>
                                <form action="<?=base_url?>Login/validar"  method="post" class="form-login">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="" type="text" autofocus>
                                            <label for="usuario">
                                                Usuario:
                                            </label>
                                        </input>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input class="form-control" id="floatingPassword" name="password" placeholder="Password" required="" type="password">
                                            <label for="floatingPassword">
                                                Contraseña:
                                            </label>
                                            <div class="form-text text-end" data-bs-target="#recuperar_pass" data-bs-toggle="modal">
                                                <a href="#">
                                                    Olvidaste tu contraseña?
                                                </a>
                                            </div>
                                        </input>
                                    </div>
                                    <div class="mb-4 row justify-content-center">
                                        <button class="btn btn-outline-primary" type="submit">
                                            Ingresar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                </section>
            </section>
        </div>
        <!-- Modal -->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="recuperar_pass" tabindex="-1">
            <article class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Recuperar contraseña
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-floating">
                                <input class="form-control" id="floatingInput" placeholder="name@example.com" required="" type="email">
                                    <label for="floatingInput">
                                        Correo electronico:
                                    </label>
                                    <div class="form-text">
                                        Te enviaremos la contraseña a tu correo.
                                    </div>
                                </input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                            Cancelar
                        </button>
                        <button class="btn btn-info text-white" type="submit">
                            Recuperar
                        </button>
                    </div>
                </div>
            </article>
        </section>
