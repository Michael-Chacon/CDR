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

        # periodo 1
        $evaluacionPeriodo1 = $notas->notaEvaluacionPeriodox(1);
        $trimestralPeriodo1 = $notas->notaTrimestralPeriodox(1);
        // exit;
        $trabajoIndividualPeriodo1 = $notas->notaTindividualPeriodox(1);
        $trabajoColaborativoPeriodo1 = $notas->notaTcolaborativoPeriodox(1);
        $apreciativaPeriodo1 = $notas->notaApreciativaPeriodox(1);
        $autoevaluacionPeriodo1 = $notas->notaAutoevaluacionPeriodox(1);
        $cognitivas = $notas->calcularPromedio($evaluacionPeriodo1->nota_evaluacion, $evaluacionPeriodo1->porcentaje_evaluacion, $trimestralPeriodo1->nota_trimestral, $evaluacionPeriodo1->porcentaje_trimestral, $evaluacionPeriodo1->porcentaje_cognitivo);

        $procedimentales = $notas->calcularPromedio($trabajoIndividualPeriodo1->nota_Tindividual, $trabajoIndividualPeriodo1->porcentaje_Tindividual, $trabajoColaborativoPeriodo1->nota_Tcolaborativo, $trabajoIndividualPeriodo1->porcentaje_Tcolaborativo, $trabajoIndividualPeriodo1->porcentaje_procedimental);

        $actitudinales = $notas->calcularPromedio($apreciativaPeriodo1->nota_apreciativa, $apreciativaPeriodo1->porcentaje_apreciativa, $autoevaluacionPeriodo1->nota_autoevaluacion, $apreciativaPeriodo1->porcentaje_autoevaluacion, $apreciativaPeriodo1->porcentaje_actitudinal);

        # nota definitiva para el periodo 1
        $definitiva = $notas->definitivaPerido($cognitivas[1], $procedimentales[1], $actitudinales[1]);

        # periodo 2
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
