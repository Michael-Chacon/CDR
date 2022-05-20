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
}
