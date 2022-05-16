<!-- Sidebar-->
            <div class="border-end " id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom ">
                    <div class="row justify-content-center bg-light ">
                        <div class="col-6 text-center bg-light">
                            <?php if ($_SESSION['student']['img'] == null): ?>
                                <img alt="..." class="avatar circulo" src="<?=base_url?>helpers/img/avatar.jpg">
                            <?php else: ?>
                                <img alt="" class="avatar circulo" src="<?=base_url?>photos/estudiantes/<?=$_SESSION['student']['img']?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <p class="nombre">
                            <?=$_SESSION['student']['nombre_e'];?>
                            <?=$_SESSION['student']['apellidos_e'];?>
                        </p>
                    </div>
                     <hr class="hr-perfil"/>
                     <div class="row text-center justify-content-center sobra">
                         <div class="col-md-6">
                            <h6 class="titulo-menu">
                                <small><?=$_SESSION['student']['rol']?></small>
                            </h6>
                            <p class="subtexto">
                                Rol
                            </p>
                        </div>
                </div>
                </div>
                <div class="list-group list-group-flush ">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url?>Student/homeEstudiante">
                       <i class="bi bi-house"></i> <span>Inicio</span>
                    </a>
                    <div class="dropend">
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="bi bi-file-earmark-text"></i>  Boletines
                       </a>
                       <ul class="dropdown-menu dropdown-menu-dark text-center">
                        <li><a class="dropdown-item" href="<?=base_url?>Boletin/verBoletin&student=<?=Utils::encryption($_SESSION['student']['id'])?>&degree=<?=Utils::encryption($_SESSION['student']['id_gradoE'])?>&period=<?=Utils::encryption(1)?>">Periodo 1</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?=base_url?>Boletin/verBoletin&student=<?=Utils::encryption($_SESSION['student']['id'])?>&degree=<?=Utils::encryption($_SESSION['student']['id_gradoE'])?>&period=<?=Utils::encryption(2)?>">Periodo 2</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?=base_url?>Boletin/verBoletin&student=<?=Utils::encryption($_SESSION['student']['id'])?>&degree=<?=Utils::encryption($_SESSION['student']['id_gradoE'])?>&period=<?=Utils::encryption(3)?>">Periodo 3</a></li>
                    </ul>
                </div>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Student/datosEstudiante">
                       <i class="bi bi-info-circle"></i>  Mis datos
                    </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Student/observador">
                         <i class="bi bi-sunglasses"></i> Observaciones
                     </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Teacher/documentos">
                       <i class="bi bi-file-earmark-arrow-down"></i>  Documentos institucionales
                    </a>
                     <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Periodo/vista_config">
                       <i class="bi bi-calendar-range"></i> Periodos académicos
                    </a>
                </div>
            </div>
