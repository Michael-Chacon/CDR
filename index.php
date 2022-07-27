<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/constantes.php';
require_once 'config/database.php';
require_once 'config/utils.php';
require_once 'views/layout/header.php';

$db = new Database();

function show_error()
{
    Utils::Error404();
}
# obtener el controladore del url
if (isset($_GET['controlador'])) {
    $nombre_controlador = $_GET['controlador'] . 'Controller';
} elseif (!isset($_GET['controlador']) && !isset($_GET['metodo'])) {
    # Controlador que se ejecuta por defecto cuando no se esta llamando a uno por la url
    $nombre_controlador = controller_df;
} else {
    # Si el controlador no existe debe mostrarse el erro 404
    show_error();
}
# Verificar sí el controlador obtenido en la url es una clase y si el metodo obtenido de la url es un metodo de la clase controlador
if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (isset($_GET['metodo']) && method_exists($controlador, $_GET['metodo'])) {
        $metodo = $_GET['metodo'];
        $controlador->$metodo();
    } elseif (!isset($_GET['controlador']) && !isset($_GET['metodo'])) {
        # Metodo que se ejecuta por defecto cuando no se esta llamando a uno por el url
        $metodo_definido = metodo_df;
        $controlador->$metodo_definido();
    } else {
        show_error();
    }
} else {
    show_error();
}
require_once 'views/layout/footer.php';
ob_end_flush();
