<?php
// auto carga de los controladores raiz
function autocarga_raiz($controlador)
{
    if (file_exists('controllers/' . $controlador . '.php')) {
        include 'controllers/' . $controlador . '.php';
    }
}
spl_autoload_register('autocarga_raiz');

// auto carga de los controladores del mosulo administrador
function autocarga_admin($administrativos)
{
    if (file_exists('controllers/administrativo/' . $administrativos . '.php')) {
        include 'controllers/administrativo/' . $administrativos . '.php';
    }
}
spl_autoload_register('autocarga_admin');
