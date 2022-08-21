<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <title>
            CDR
        </title>
        <!-- Iconos do bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css"/>
        <!-- fuente -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        </style>
        <!-- Favicon-->
        <link href="assets/favicon.ico" rel="icon" type="image/x-icon"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=base_url?>helpers/css/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url?>helpers/css/styles.css" rel="stylesheet"/>
    </head>
    <body>
        <main class="d-flex" id="wrapper">
            <!-- menu para adminstrativos -->
            <?php if (isset($_SESSION['user'])): ?>
                <?php include 'views/layout/modulos/administrativo.php';?>
                <!-- menu para el modulo de docentes -->
            <?php elseif (isset($_SESSION['teacher'])): ?>
                <?php include 'views/layout/modulos/docente.php';?>
                <!-- menu para estudiantes -->
            <?php elseif (isset($_SESSION['student'])): ?>
                <?php include 'views/layout/modulos/estudiante.php';?>
            <?php endif;?>
            <!-- Page content wrapper-->
            <section id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-dark" id="sidebarToggle" accesskey="h">
                            <i class="bi bi-list"></i>
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
                <?php if (isset($_SESSION['teacher']) && $_SESSION['estadoBoletin'] == 'Habilitado'): ?>
                    <div class="alert alert-danger text-center alert-alert" role="alert">
                        <span class="texto-alert-alert">
                        Está habilitada la opción para subir notas al boletín, los directores de grado recuerden registrar la nota de comportamiento de sus estudiantes
                        </span>
                    </div>
                <?php endif;?>
            <!-- contenido de  la pagina -->
