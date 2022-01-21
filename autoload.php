<?php
// auto carga de los controladores raiz
function autocarga_raiz($controlador)
{
    if (file_exists('controllers/' . $controlador . '.php')) {
        include 'controllers/' . $controlador . '.php';
    }
}
spl_autoload_register('autocarga_raiz');

// auto carga de los controladores del modulo administrador
function autocarga_admin($administrativos)
{
    if (file_exists('controllers/administrativo/' . $administrativos . '.php')) {
        include 'controllers/administrativo/' . $administrativos . '.php';
    }
}
spl_autoload_register('autocarga_admin');

// auto carga de los controladores del modulo de docentes
function autocarga_docentes($docentes)
{
    if (file_exists('controllers/docentes/' . $docentes . '.php')) {
        include 'controllers/docentes/' . $docentes . '.php';
    }
}
spl_autoload_register('autocarga_docentes');
