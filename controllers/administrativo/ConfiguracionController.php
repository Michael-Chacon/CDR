<?php

require_once 'models/area.php';
require_once 'models/grados.php';
require_once 'models/materias.php';
require_once 'models/notas.php';
require_once 'models/docente.php';
require_once 'models/boletin.php';
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

    # vista para configurar el porcentaje de los  criterios de evaluacion
    public function vista_notas()
    {
        $criterios = new Notas();
        $cognitivas = $criterios->dataCognitivo();
        $procedimentales = $criterios->dataProcedimental();
        $actitudinales = $criterios->dataActitudinal();

        if (empty($cognitivas->porcentaje_cognitivo)) {
            $cognitivo = 0;
            $evaluacion = 0;
            $trimestral = 0;
        } else {
            $cognitivo = $cognitivas->porcentaje_cognitivo;
            $evaluacion = $cognitivas->porcentaje_evaluacion;
            $trimestral = $cognitivas->porcentaje_trimestral;
        }

        if (empty($procedimentales->porcentaje_procedimental)) {
            $procedimental = 0;
            $individual = 0;
            $colaborativo = 0;
        } else {
            $procedimental = $procedimentales->porcentaje_procedimental;
            $individual = $procedimentales->porcentaje_Tindividual;
            $colaborativo = $procedimentales->porcentaje_Tcolaborativo;
        }

        if (empty($actitudinales->porcentaje_actitudinal)) {
            $actitudinal = 0;
            $apreciativa = 0;
            $autoevaluacion = 0;
        } else {
            $actitudinal = $actitudinales->porcentaje_actitudinal;
            $apreciativa = $actitudinales->porcentaje_apreciativa;
            $autoevaluacion = $actitudinales->porcentaje_autoevaluacion;
        }
        require_once 'views/administrativo/configuracion/porcentaje.php';
    }

    public function vista_directores()
    {
        $directores = new Docente();
        $listado_directores = $directores->directoresGrados();

        require_once 'views/administrativo/configuracion/directores.php';
    }

    public function vista_havilitar_boletin()
    {
        $boletin = new Boletin();
        $estado = $boletin->estadoBoletin();
        require_once 'views/administrativo/configuracion/HavBoletin.php';
    }

    public function guardar_area()
    {
        $nombre = mb_strtoupper($_POST['area'], 'UTF-8');
        $color = $_POST['color'];
        $duplicado = Utils::validarExistenciaDUnCampo($nombre, 'areas', 'nombre_area');
        if ($duplicado == 0) {
            $guardar = new Area();
            $guardar->setNombre($nombre);
            $guardar->setColor($color);
            $respuesta = $guardar->saveArea();
            Utils::alertas($respuesta, 'Área creada con éxito', 'Algo salió mal al intentar registrar el área, inténtalo de nuevo.');
        } else {
            $mal = false;
            Utils::alertas($mal, '', 'El nombre de esta área ya está registrado en la base de datos, intenta con otro nombre.');
        }
        header('Location:' . base_url . 'Configuracion/vista_areas');
    }

    public function eliminar_area()
    {
        $id_area = $_GET['id'];
        $eliminar = new Area();
        $eliminar->setId($id_area);
        $resultado = $eliminar->deleteArea();
        Utils::alertas($resultado, 'El área fue eliminada con éxito', 'Algo salió mal al intentar eliminar el área, inténtelo de nuevo');
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
            Utils::alertas($respuesta, 'Aula creada con éxito', 'Algo salió mal al intentar registrar el aula, inténtalo de nuevo.');
        } else {
            $mal = false;
            Utils::alertas($mal, '', 'Ya existe una aula con el mismo nombre registrada en la base de datos, utiliza un nombre diferente.');
        }
        header('Location:' . base_url . 'Configuracion/vista_aula');
    }

    public function eliminar_aula()
    {
        $id_aula = $_GET['id'];
        $eliminar = new Grados();
        $eliminar->setId($id_aula);
        $resultado = $eliminar->deleteClassroom();
        Utils::alertas($resultado, 'El aula fue eliminada con éxito', 'Algo salió mal al intentar eliminar el aula, inténtelo de nuevo');
        header('Location:' . base_url . 'Configuracion/vista_aula');
    }

    // guardar las materias base
    public function guardar_materia_base()
    {
        $materia = trim(ucfirst($_POST['materia']));
        $porcentaje = $_POST['porcentaje'];
        $icono = trim($_POST['icono']);
        $area = $_POST['area'];
        $registrador = new Materias();
        $registrador->setMateria($materia);
        $registrador->setPorcentaje($porcentaje);
        $registrador->setIcono($icono);
        $registrador->setArea($area);
        $respuesta = $registrador->saveBaseSubject();
        Utils::alertas($respuesta, 'La materia fue registrada con éxito.', 'Algo salió mal al registrar la materia, inténtelo de nuevo.');
        header("Location:" . base_url . 'Configuracion/vista_areas');
    }

    public function eliminar_materia_base()
    {
        $id_materia = $_GET['id'];
        $eliminar = new Materias();
        $eliminar->setArea($id_materia);
        $resultado = $eliminar->deleteBaseSubject();
        Utils::alertas($resultado, 'La materia fue eliminada con éxito.', 'Algo salió mal al eliminar la materia, inténtelo de nuevo.');
        header('Location:' . base_url . 'Configuracion/vista_areas');
    }

    # METODOS PARA ACTUALIZAR LOS PORCENTAJES DE LOS CRITERIOS DE EVALUACION "COGNITIVO, PROCEDIMENTAL Y ACTITUDINAL"
    public function actualizarCognitivo()
    {
        $cognitivo = $_POST['cognitivo'];
        $evaluacion = $_POST['evaluacion'];
        $trimestral = $_POST['trimestral'];
        $actualizador = new Notas();
        $actualizador->setCognitivo($cognitivo);
        $actualizador->setEvaluacion($evaluacion);
        $actualizador->setTrimestral($trimestral);
        $respuesta = $actualizador->updateCognitivo();
        Utils::alertas($respuesta, 'Porcentaje actualizado con éxito', 'Error al actualizar el porcentaje');
        header('Location:' . base_url . 'Configuracion/vista_notas');
    }

    public function actualizarProcedimental()
    {
        $procedimental = $_POST['procedimental'];
        $individual = $_POST['individual'];
        $colaborativo = $_POST['colaborativo'];
        $actualizador = new Notas();
        $actualizador->setProcedimental($procedimental);
        $actualizador->setTindividual($individual);
        $actualizador->setTcolaborativo($colaborativo);
        $respuesta = $actualizador->updateProcedimental();
        Utils::alertas($respuesta, 'Porcentaje actualizado con éxito', 'Error al actualizar el porcentaje');
        header('Location:' . base_url . 'Configuracion/vista_notas');
    }

    public function actualizarActitudinal()
    {
        $actitudinal = $_POST['actitudinal'];
        $apreciativa = $_POST['apreciativa'];
        $autoevaluacion = $_POST['autoevaluacion'];
        $actualizador = new Notas();
        $actualizador->setActitudinal($actitudinal);
        $actualizador->setApreciativa($apreciativa);
        $actualizador->setAutoevaluacion($autoevaluacion);
        $respuesta = $actualizador->updateActitudinal();
        Utils::alertas($respuesta, 'Porcentaje actualizado con éxito', 'Error al actualizar el porcentaje');
        header('Location:' . base_url . 'Configuracion/vista_notas');
    }

    # Metodo para eliminar la asignacion como director a un docente
    public function eliminarDirector()
    {
        $docente = $_GET['docente'];
        $eliminar = new Docente();
        $eliminar->setId($docente);
        $respuesta = $eliminar->deleteDirector();
        if ($respuesta) {
            $eliminar->uptadeDirector('no');
        }
        Utils::alertas($respuesta, 'El docente ya no es director', 'Algo salió mal al intentar eliminar el director.');
        header('Location:' . base_url . 'Configuracion/vista_directores');
    }

    public function cambiarEstadoBoletin()
    {
        if (empty($_POST['estado'])) {
            $estado = 'Deshabilitado';
        } else {
            $estado = 'Habilitado';
        }
        $estado_boletin = new Boletin();
        $estado_boletin->setObservacion($estado);
        $resultado = $estado_boletin->actualizarEstadoBoletin();
        Utils::alertas($resultado, 'El estado del boletín fue actualizado con éxito', 'Algo salió mal al intentar actualizar el estado del boletín, inténtelo de nuevo.');
        header("Location: " . base_url . 'Configuracion/vista_havilitar_boletin');
    }

}
