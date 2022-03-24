<?php
require_once 'models/materias.php';
require_once 'models/estudiante.php';
require_once 'models/fallas.php';
require_once 'models/notas.php';

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
        # notas por periodo
        $notas = new Notas();
        $notas->setMateria($id_materia);
        $notas->setEstudiante($id_estudiante);
        $periodo1 = $notas->notasPeriodo1();
        $periodo2 = $notas->notasPeriodo2();
        $periodo3 = $notas->notasPeriodo3();
        if (isset($_GET['dir']) && $_GET['dir'] == 'ok') {
            require_once 'views/docente/notasDirector.php';
        } else {
            require_once 'views/docente/notas.php';
        }
    }

    #registrar notas en los diferentes criterios evaluativos
    public function guardarNota()
    {
        $actividad = $_POST['actividad'];
        $nota = $_POST['nota'];
        $materia = $_POST['materia'];
        $estudiante = $_POST['estudiante'];
        $hoy = date("Y-m-d");
        $periodo = Utils::validarPeriodoAcademico($hoy);

        $criterios = new Notas();
        $cognitivo = $criterios->dataCognitivo();
        $procedimental = $criterios->dataProcedimental();
        $actitudinal = $criterios->dataActitudinal();

        if ($actividad == 'evaluacion' || $actividad == 'trimestral') {
            $criterio = $cognitivo->id_cognitivo;
            $respuesta = $criterios->saveAllNotes($estudiante, $materia, $periodo, $criterio, $nota, $actividad);
        } elseif ($actividad == 'tindividual' || $actividad == 'tcolaborativo') {
            $criterio = $procedimental->id_procedimental;
            $respuesta = $criterios->saveAllNotes($estudiante, $materia, $periodo, $criterio, $nota, $actividad);
        } elseif ($actividad == 'apreciativa' || $actividad == 'autoevaluacion') {
            $criterio = $actitudinal->id_actitudinal;
            $respuesta = $criterios->saveAllNotes($estudiante, $materia, $periodo, $criterio, $nota, $actividad);
        }
        Utils::validarReturn($respuesta, 'registrarNota');
        header('Location: ' . base_url . 'Notas/homeNotas&student=' . $estudiante . '&materia=' . $materia . '&nGrado=' . $_POST['grado']);
    }

}
