 <!-- Sidebar-->
            <div class="border-end" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom ">
                    <div class="row justify-content-center bg-light ">
                        <div class="col-6 text-center bg-light">
                            <img alt="" class="avatar circulo" src="<?=base_url?>helpers/img/perfilman.jpg">
                            </img>
                        </div>
                    </div>
                    <div class="row">
                        <p class="nombre">
                            <?=$_SESSION['user']->nombre_a;?>
                            <?=$_SESSION['user']->apellidos_a;?>
                        </p>
                    </div>
                </div>
                <div class="list-group list-group-flush ">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url?>Login/homeAdministrativo">
                       <i class="bi bi-house"></i> <span>Inicio</span>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Estudiante/estudiantes">
                        <i class="bi bi-people"></i>  Estudiantes
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Docente/vista_docente">
                        <i class="bi bi-person"></i>  Docentes
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Administrativo/vista_administrativo">
                        <i class="bi bi-person-check"></i>  Administrativos
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Personal/vista_personal">
                        <i class="bi bi-shield"></i>  Personal
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Grado/grado">
                        <i class="bi bi-grid-3x2-gap"></i>  Grados
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Periodo/vista_config">
                        <i class="bi bi-gear"></i>  Periodos
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Asignaciones/vista_asignaciones">
                        <i class="bi bi-ui-checks-grid"></i>  Asignaciones
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Configuracion/vista_configuracion">
                        <i class="bi bi-gear"></i>  Más opciones
                    </a>
                </div>
            </div>