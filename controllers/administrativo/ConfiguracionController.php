<?php

require_once 'models/area.php';
require_once 'models/grados.php';
require_once 'models/materias.php';
class ConfiguracionController
{
    public function vista_configuracion()
    {
        require_once 'views/administrativo/configuracion/home.php';
    }

    public function vista_areas()
    {
        $listado = new Area();
        $areas = $listado->getAreas();
        $areas_materia = $listado->getAreas();

        # listado de materias
        $materias = new Materias();
        $listado_materias = $materias->getAllBaseSubjectes();

        require_once 'views/administrativo/configuracion/areas.php';
    }

    public function vista_aula()
    {
        $listado_aulas = new Grados();
        $todas_aulas = $listado_aulas->selectAllClassroom();
        require_once 'views/administrativo/configuracion/aulas.php';
    }

    public function guardar_area()
    {
        $nombre = strtoupper($_POST['area']);
        $color = $_POST['color'];
        $duplicado = Utils::validarExistenciaDUnCampo($nombre, 'areas', 'nombre_area');
        if ($duplicado == 0) {
            $guardar = new Area();
            $guardar->setNombre($nombre);
            $guardar->setColor($color);
            $respuesta = $guardar->saveArea();
            Utils::validarReturn($respuesta, 'guardar_area');
        } else {
            $mal = false;
            Utils::validarReturn($mal, 'area_duplicada');
        }
        header('Location:' . base_url . 'Configuracion/vista_areas');
    }

    public function eliminar_area()
    {
        $id_area = $_GET['id'];
        $eliminar = new Area();
        $eliminar->setId($id_area);
        $resultado = $eliminar->deleteArea();
        Utils::validarReturn($resultado, 'eliminar_area');
        header('Location:' . base_url . 'Configuracion/vista_areas');
    }

    public function guardar_aula()
    {
        $nombre = strtoupper($_POST['aula']);
        $duplicado = Utils::validarExistenciaDUnCampo($nombre, 'aulas', 'nombre');
        if ($duplicado == 0) {
            $aula = new Grados();
            $aula->setAula($nombre);
            $respuesta = $aula->saveClassroom();
            Utils::validarReturn($respuesta, 'guardar_aula');
        } else {
            $mal = false;
            Utils::validarReturn($mal, 'aula_duplicada');
        }
        header('Location:' . base_url . 'Configuracion/vista_aula');
    }

    public function eliminar_aula()
    {
        $id_aula = $_GET['id'];
        $eliminar = new Grados();
        $eliminar->setId($id_aula);
        $resultado = $eliminar->deleteClassroom();
        Utils::validarReturn($resultado, 'eliminar_aula');
        header('Location:' . base_url . 'Configuracion/vista_aula');
    }

    // guardar las materias base
    public function guardar_materia_base()
    {
        $materia = trim($_POST['materia']);
        $icono = trim($_POST['icono']);
        $area = $_POST['area'];
        $registrador = new Materias();
        $registrador->setMateria($materia);
        $registrador->setIcono($icono);
        $registrador->setArea($area);
        $respuesta = $registrador->saveBaseSubject();
        Utils::validarReturn($respuesta, 'guardar_materia_base');
        header("Location:" . base_url . 'Configuracion/vista_areas');
    }

    public function eliminar_materia_base()
    {
        $id_materia = $_GET['id'];
        $eliminar = new Materias();
        $eliminar->setArea($id_materia);
        $resultado = $eliminar->deleteBaseSubject();
        Utils::validarReturn($resultado, 'eliminar_base');
        header('Location:' . base_url . 'Configuracion/vista_areas');
    }
}
