<!-- Sidebar-->
            <div class="border-end " id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom ">
                    <div class="row justify-content-center bg-light ">
                        <div class="col-6 text-center bg-light">
                            <img alt="" class="avatar circulo" src="<?=base_url?>photos/docentes/<?=$_SESSION['teacher']->img?>">
                            </img>
                        </div>
                    </div>
                    <div class="row">
                        <p class="nombre">
                            <?=$_SESSION['teacher']->nombre_d;?>
                            <?=$_SESSION['teacher']->apellidos_d;?>
                        </p>
                    </div>
                </div>
                <div class="list-group list-group-flush ">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url?>Teacher/homeDocente">
                       <i class="bi bi-house"></i> <span>Inicio</span>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Teacher/misDatos">
                       <i class="bi bi-info-circle"></i>  Mis datos
                    </a>
                     <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Periodo/vista_config">
                       <i class="bi bi-calendar-range"></i> Periodos académicos
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Teacher/documentos">
                       <i class="bi bi-file-earmark-arrow-down"></i>  Documentos institucionales
                    </a>
                </div>
            </div>