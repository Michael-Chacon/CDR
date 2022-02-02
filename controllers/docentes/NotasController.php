<?php
require_once 'models/materias.php';
require_once 'models/estudiante.php';
require_once 'models/fallas.php';
class NotasController
{
    public function homeNotas()
    {
        $id_materia = $_GET['materia'];
        $grado = $_GET['nGrado'];
        $id_estudiante = $_GET['student'];
        # obtener los datos del estudiante
        $datos_estudiante = new Estudiante();
        $datos_estudiante->setId($id_estudiante);
        $estudiante = $datos_estudiante->selectOneStudent();
        # obtenero los datos de la materia
        $datos_materia = new Materias();
        $datos_materia->setMateria($id_materia);
        $materia = $datos_materia->selectOneSubject();
        # total fallas
        $asistencia = new Fallas();
        $asistencia->setEstudiante($id_estudiante);
        $asistencia->setMateria($id_materia);
        $fallas = $asistencia->totalFailsAStudent();
        $fechas_fallas = $asistencia->dateFailsAStudent();
        require_once 'views/docente/notas.php';
    }
}
