<div class="container-fluid">
	<section class="row  titulo">
                    <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                        <h1 class="text-center config">
                            Configuracion
                        </h1>
                    </article>
                    <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
                        <a aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            <i class="bi bi-menu-up efecto_hover" style="font-size: 2rem; color: white;">
                            </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" data-bs-target="#periodo_academico" data-bs-toggle="modal" href="#">
                                    <i class="bi bi-plus-circle" style="color: #7C368F;">
                                    </i>
                                    Crear periodo
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-lock" style="color: #7C368F;">
                                    </i>
                                    Cambiar contraseña
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Menu item
                                </a>
                            </li>
                        </ul>
                    </article>
                </section>
                <?php echo Utils::general_alerts('periodo', 'Periodo académico registrado con éxito.', 'Algo salió mal al registrar el periodo académico, inténtelo de nuevo.'); ?>
                <?php Utils::borrar_error('periodo'); ?>
                <?php echo Utils::general_alerts('validacion_fechas', '', 'Las fechas que acaba de ingresar se cruzan con la fecha de un periodo que ya existe.'); ?>
                <?php Utils::borrar_error('validacion_fechas'); ?>
                <?php echo Utils::general_alerts('validacion_numero', '', 'El número del periodo académico ya existe.'); ?>
                <?php Utils::borrar_error('validacion_numero'); ?>
                <?php echo Utils::general_alerts('eliminarPeriodo', 'El periodo fue eliminado con éxito.', 'Algo salió mal al eliminar el periodo.'); ?>
                <?php Utils::borrar_error('eliminarPeriodo'); ?>
                <h2 class="text-center mt-5 mb-3 espezor">
                    <i class="bi bi-calendar2-range">
                    </i>
                    Periodos académicos
                </h2>
                <section class="row">
                    <?php if($listado->rowCount() != 0):
                                while($periodo = $listado->fetchObject()): ?>
                                    <section class="col-xs-6 col-sm-6 col-md-6 col-lg-3 ">
                                        <article class="card text-white bg-dark mb-3 efecto_hover_periodo">
                                            <div class="card-header text-center">
                                                <article class="row">
                                                    <article class="col-10">        
                                                    <h5 class="card-title espezor">
                                                        Periodo <?=$periodo->nombre_periodo;?>
                                                    </h5>
                                                    </article>
                                                    <article class="col-2">
                                                        <article class="btn-group dropdown dropstart">
                                                            <a href="#" id="menu_periodo" data-bs-toggle="dropdown" type="button" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="menu_periodo">
                                                                <li><a class="dropdown-item" href="<?=base_url?>Periodo/eliminarPeriodo&id_periodo=<?=$periodo->id?>" onclick="return confirmar()"><i class="bi bi-trash"></i> Eliminar</a></li>
                                                            </ul>
                                                        </article>
                                                    </article>
                                                </article>
                                            </div>
                                            <div class="card-body bg-dark">
                                                <table class="table table-dark table-striped text-white ">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <i class="bi bi-caret-right">
                                                                </i>
                                                                Inicio:
                                                            </td>
                                                            <td>
                                                                <?=$periodo->fecha_inicio;?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="bi bi-flag">
                                                                </i>
                                                                Fin:
                                                            </td>
                                                            <td>
                                                                <?=$periodo->fecha_fin;?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="bi bi-activity">
                                                                </i>
                                                                Estado:
                                                            </td>
                                                            <td>
                                                                <span class="badge <?=$periodo->estado;?>">
                                                                    <?=$periodo->estado;?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </article>
                                    </section>
                    <?php endwhile;
                    else: ?>
                        <p class="text-center mt-3"><span class="badge bg-warning text-dark">No existen periodos académicos.</span></p>
                    <?php endif; ?>
                </section>
            </section>
            <!--fin del container -->
            <!-- Modal para crear periodo academico -->
            <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="periodo_academico" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Registrar periodo académico
                            </h5>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url?>Periodo/registrarPeriodo" method="post">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="numero" placeholder="Número del periodo académico:" type="number" name="numero" required>
                                                <label for="numero">
                                                    Número del periodo académico:
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" id="estado" name="estado" type="checkbox">
                                                <label class="form-check-label" for="estado">
                                                    Estado
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="inicio" placeholder="Fecha de inicio" type="date" required>
                                                <label for="floatingInput">
                                                    Fecha de inicio:
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="fin" placeholder="Fecha de fin" type="date" required>
                                                <label for="floatingInput">
                                                    Fecha de fin:
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal" type="button">
                                <i class="bi bi-x-lg">
                                </i>
                                Cancelar
                            </button>
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-check2">
                                </i>
                                Registrar
                            </button>
                        </div>
                     </form>
                    </div>
                </div>
            </section>
            <!--  FIN modal periodo academico-->
            <!-- INICIO del modal para cambiar la contraseña. -->
            <!--  FIN del  modal  para cambiar la contraseña-->
            <!-- fin del contenido de la pagina -->
</div>