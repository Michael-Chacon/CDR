<?php
require_once 'models/tablero.php';

class TableroController
{
    public function tablero()
    {
        $listado_actividades = new Tablero();
        $actividades_estudiantes = $listado_actividades->getAllActivitiesStudends();
        $actividades_docentes = $listado_actividades->getAllActivitiesTeachers();
        require_once 'views/administrativo/tablero/tablero.php';
    }

    # Guardar actividad
    public function guardarActividad()
    {
        $destinatario = $_POST['destinatario'];
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $detalle = $_POST['detalle'];
        $color = $_POST['color'];
        $save = new Tablero();
        $save->setTitulo($titulo);
        $save->setFecha($fecha);
        $save->setDetalle($detalle);
        $save->setColor($color);
        switch ($destinatario) {
            case 'estudiante':
                $resultado = $save->saveActivityStudents();
                break;
            case 'docente':
                $resultado = $save->saveActivityTeachers();
                break;
            case 'estudianteDocente':
                $resultado = $save->saveActivityStudents();
                $resultado = $save->saveActivityTeachers();
                break;
            default:
                $resultado = false;
                break;
        }
        Utils::alertas($resultado, 'La actividad se ha registrado en el tablero exitosamente', 'Algo salió mal al intentar registrar la actividad. No olvide seleccionar el destinatario');
        header('Location:' . base_url . 'Tablero/tablero');

    }

    # Eliminar actividad del tablero
    public function eliminarTablero()
    {
        $id_actividad = $_GET['id'];
        $usuario = $_GET['usuario'];

        switch ($usuario) {
            case 'estudiante':
                $tabla = "tableroactividadesestudiantes";
                break;
            case 'docente':
                $tabla = "tableroactividadesdocentes";
                break;
        }

        $borrador = new Tablero();
        $borrador->setId($id_actividad);
        $borrador->setUsuario($tabla);
        $resultado = $borrador->delecteActivity();

        Utils::alertas($resultado, 'La actividad se ha eliminado del tablero exitosamente', 'Algo salió mal al intentar eliminar la actividad');
        header('Location:' . base_url . 'Tablero/tablero');
    }

    # Metodo para listar todas las actividades de estudiantes o docentes
    public function verActividades()
    {
        $usuario = Utils::decryption($_GET['user']);
        $tablero = new Tablero();
        if ($usuario == 'docente') {
            $listado_actividades = $tablero->getAllActivitiesTeachers();
        } elseif ($usuario == 'estudiante') {
            $listado_actividades = $tablero->getAllActivitiesStudends();
        } else {
            Utils::Error404();
        }
        require_once 'views/administrativo/tablero/actividades.php';
    }
}
