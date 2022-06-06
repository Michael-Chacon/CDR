<?php
require_once 'models/icono.php';
class IconosController
{
    public function vista()
    {
        $listado = new Iconos();
        $listado_iconos = $listado->listIconos();
        require_once 'views/administrativo/configuracion/iconos.php';
    }

    public function guardarIcono()
    {
        $nombre = $_POST['icono'];
        $registrar = new Iconos();
        $registrar->setNombre($nombre);
        $resultado = $registrar->saveIcono();
        Utils::alertas($resultado, 'Icono registrado con éxito', 'Algo salió mal al intentar registrar el Icono, inténtelo de nuevo');
        header("Location: " . base_url . 'Iconos/vista');
    }

    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = new Iconos();
        $resultado = $eliminar->deleteIcono($id);
        Utils::alertas($resultado, 'Icono eliminado con éxito', 'Algo salió mal al intentat eliminar el icono, inténtelo de nuevo');
        header("Location: " . base_url . 'Iconos/vista');
    }
}
