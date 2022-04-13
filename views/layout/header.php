<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <title>
            CDR
        </title>
        <!-- Iconos do bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
            <!-- fuente -->
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
            </style>
            <!-- Favicon-->
            <link href="assets/favicon.ico" rel="icon" type="image/x-icon"/>
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="<?=base_url?>helpers/css/estilos.css" rel="stylesheet" type="text/css">
                <link href="<?=base_url?>helpers/css/styles.css" rel="stylesheet"/>
            </link>
        </link>
    </head>
    <body>
        <main class="d-flex" id="wrapper">
            <?php if (isset($_SESSION['user'])): ?>
            <!-- Sidebar-->
            <div class="border-end " id="sidebar-wrapper">
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
            <!-- menu para el modulo de docentes -->
            <?php elseif (isset($_SESSION['teacher'])): ?>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Teacher/documentos">
                       <i class="bi bi-file-earmark-arrow-down"></i>  Documentos institucionales
                    </a>
                     <a class="list-group-item list-group-item-action list-group-item-light p-3 menu-items" href="<?=base_url?>Periodo/vista_config">
                       <i class="bi bi-calendar-range"></i> Periodos académicos
                    </a>
                </div>
            </div>
            <?php endif;?>
            <!-- Page content wrapper-->
            <section id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-success" id="sidebarToggle" accesskey="h">
                            <i class="bi bi-list"></i>Menu
                        </button>
                         <span class="cdr text-center">CONCENTRACIÓN DE DESARROLLO RURAL VALLE DE SAN JOSÉ</span>
                        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                            <span class="navbar-toggler-icon">
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#!">
                                        <!-- <h4>CONCENTRACIÓN DE DESARROLLO RURAL VALLE DE SAN JOSÉ</h4> -->
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url?>Login/logout">
                                        <button class="btn btn-outline-secondary">
                                        <i class="bi bi-power" style="font-size: 1.2rem; color: red;"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- contenido de  la pagina -->
