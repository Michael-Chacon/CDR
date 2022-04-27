<?php
require_once 'models/materias.php';
require_once 'models/estudiante.php';
require_once 'models/fallas.php';
require_once 'models/notas.php';
require_once 'models/observador.php';
require_once 'models/actividades.php';
require_once 'models/documentos.php';
class NotasController
{
    public function homeNotas()
    {
        if (!isset($_GET['materia']) || !isset($_GET['student'])) {
            Utils::Error404();
        } elseif (empty(Utils::decryption($_GET['materia'])) || empty(Utils::decryption($_GET['student']))) {
            Utils::Error404();
        } else {

            $id_materia = Utils::decryption($_GET['materia']);
            $id_estudiante = Utils::decryption($_GET['student']);

            if (isset($_GET['nGrado'])) {
                $grado = $_GET['nGrado'] . '°';
            } else {
                $grado = '';
            }
            # Obteniendo los datos del estudiante la cual se quire consultar las notas y demas.
            $datos_estudiante = new Estudiante();
            $datos_estudiante->setId($id_estudiante);
            $estudiante = $datos_estudiante->selectOneStudent();
            # Obteniendo los datos de la materia
            $datos_materia = new Materias();
            $datos_materia->setMateria($id_materia);
            #informacion de la materia
            $materia = $datos_materia->selectOneSubject();
            # JInformacion del docente y la materia
            $docente = $datos_materia->subjectInformation();

            # Obteniendo informacion de la inasistencia del estudianta
            $asistencia = new Fallas();
            $asistencia->setEstudiante($id_estudiante);
            $asistencia->setMateria($id_materia);
            $fallas = $asistencia->totalFailsAStudent();
            $fechas_fallas = $asistencia->dateFailsAStudent();

            $observaciones = new Observador();
            $observaciones->setEstudiante($id_estudiante);
            $observador = $observaciones->countObservations();

            # Accediento a la clase Notas
            $notas = new Notas();
            # Obteniendo los porcentajes de todos los criterios evaluativos
            $cognitivo = $notas->dataCognitivo();
            $procedimental = $notas->dataProcedimental();
            $actitudinal = $notas->dataActitudinal();
            # Pasando los parametros necesarios para obtener la informacion
            $notas->setMateria($id_materia);
            $notas->setEstudiante($id_estudiante);

            # Hallando las notas del PERIODO 1
            # Calculando notas del criterio cognitivo periodo 1
            $evaluacionPeriodo1 = $notas->notaEvaluacionPeriodox(1);
            $trimestralPeriodo1 = $notas->notaTrimestralPeriodox(1);
            if (!empty($evaluacionPeriodo1->nota_evaluacion) && !empty($trimestralPeriodo1->nota_trimestral)) {
                $cognitivasUno = $notas->calcularNota($evaluacionPeriodo1->nota_evaluacion, $cognitivo->porcentaje_evaluacion, $trimestralPeriodo1->nota_trimestral, $cognitivo->porcentaje_trimestral, $cognitivo->porcentaje_cognitivo);
                $definitiva_cognitivoUno = $cognitivasUno[0];
            } else {
                $definitiva_cognitivoUno = 0;
            }
            # Calculando notas del criterio procedimental periodo 1
            $trabajoIndividualPeriodo1 = $notas->notaTindividualPeriodox(1);
            $trabajoColaborativoPeriodo1 = $notas->notaTcolaborativoPeriodox(1);
            if (!empty($trabajoIndividualPeriodo1->nota_Tindividual) && !empty($trabajoColaborativoPeriodo1->nota_Tcolaborativo)) {
                $procedimentalesUno = $notas->calcularNota($trabajoIndividualPeriodo1->nota_Tindividual, $procedimental->porcentaje_Tindividual, $trabajoColaborativoPeriodo1->nota_Tcolaborativo, $procedimental->porcentaje_Tcolaborativo, $procedimental->porcentaje_procedimental);
                $definitiva_procedimentalUno = $procedimentalesUno[0];
            } else {
                $definitiva_procedimentalUno = 0;
            }
            # Calculando notas del criterio actitudinal periodo 1
            $apreciativaPeriodo1 = $notas->notaApreciativaPeriodox(1);
            $autoevaluacionPeriodo1 = $notas->notaAutoevaluacionPeriodox(1);
            if (!empty($apreciativaPeriodo1->nota_apreciativa) && !empty($autoevaluacionPeriodo1->nota_autoevaluacion)) {
                $actitudinalesUno = $notas->calcularNota($apreciativaPeriodo1->nota_apreciativa, $actitudinal->porcentaje_apreciativa, $autoevaluacionPeriodo1->nota_autoevaluacion, $actitudinal->porcentaje_autoevaluacion, $actitudinal->porcentaje_actitudinal);
                $definitiva_actitudinalUno = $actitudinalesUno[0];
            } else {
                $definitiva_actitudinalUno = 0;
            }
            # Hallando la nota definitiva del periodo 1
            if (!empty($apreciativaPeriodo1->nota_apreciativa) && !empty($autoevaluacionPeriodo1->nota_autoevaluacion) && !empty($trabajoIndividualPeriodo1->nota_Tindividual) && !empty($trabajoColaborativoPeriodo1->nota_Tcolaborativo) && !empty($evaluacionPeriodo1->nota_evaluacion) && !empty($trimestralPeriodo1->nota_trimestral)) {
                $definitiva_periodo1 = $notas->definitivaPerido($cognitivasUno[1], $procedimentalesUno[1], $actitudinalesUno[1]);
            } else {
                $definitiva_periodo1 = 0;
            }

            # Hallando las notas del PERIODO 2
            # Calculando notas del criterio cognitivo periodo 2
            $evaluacionPeriodo2 = $notas->notaEvaluacionPeriodox(2);
            $trimestralPeriodo2 = $notas->notaTrimestralPeriodox(2);
            if (!empty($evaluacionPeriodo2->nota_evaluacion) && !empty($trimestralPeriodo2->nota_trimestral)) {
                $cognitivasDos = $notas->calcularNota($evaluacionPeriodo2->nota_evaluacion, $cognitivo->porcentaje_evaluacion, $trimestralPeriodo2->nota_trimestral, $cognitivo->porcentaje_trimestral, $cognitivo->porcentaje_cognitivo);
                $definitiva_cognitivoDos = $cognitivasDos[0];
            } else {
                $definitiva_cognitivoDos = 0;
            }
            # Calculando notas del criterio procedimental periodo 2
            $trabajoIndividualPeriodo2 = $notas->notaTindividualPeriodox(2);
            $trabajoColaborativoPeriodo2 = $notas->notaTcolaborativoPeriodox(2);
            if (!empty($trabajoIndividualPeriodo2->nota_Tindividual) && !empty($trabajoColaborativoPeriodo2->nota_Tcolaborativo)) {
                $procedimentalesDos = $notas->calcularNota($trabajoIndividualPeriodo2->nota_Tindividual, $procedimental->porcentaje_Tindividual, $trabajoColaborativoPeriodo2->nota_Tcolaborativo, $procedimental->porcentaje_Tcolaborativo, $procedimental->porcentaje_procedimental);
                $definitiva_procedimentalDos = $procedimentalesDos[0];
            } else {
                $definitiva_procedimentalDos = 0;
            }
            # Calculando notas del criterio actitudiana periodo 2
            $apreciativaPeriodo2 = $notas->notaApreciativaPeriodox(2);
            $autoevaluacionPeriodo2 = $notas->notaAutoevaluacionPeriodox(2);
            if (!empty($apreciativaPeriodo2->nota_apreciativa) && !empty($autoevaluacionPeriodo2->nota_autoevaluacion)) {
                $actitudinalesDos = $notas->calcularNota($apreciativaPeriodo2->nota_apreciativa, $actitudinal->porcentaje_apreciativa, $autoevaluacionPeriodo2->nota_autoevaluacion, $actitudinal->porcentaje_autoevaluacion, $actitudinal->porcentaje_actitudinal);
                $definitiva_actitudinalDos = $actitudinalesDos[0];
            } else {
                $definitiva_actitudinalDos = 0;
            }
            // Hallando la nota definitiva del periodo 2
            if (!empty($apreciativaPeriodo2->nota_apreciativa) && !empty($autoevaluacionPeriodo2->nota_autoevaluacion) && !empty($trabajoIndividualPeriodo2->nota_Tindividual) && !empty($trabajoColaborativoPeriodo2->nota_Tcolaborativo) && !empty($evaluacionPeriodo2->nota_evaluacion) && !empty($trimestralPeriodo2->nota_trimestral)) {
                $definitiva_periodo2 = $notas->definitivaPerido($cognitivasDos[1], $procedimentalesDos[1], $actitudinalesDos[1]);
            } else {
                $definitiva_periodo2 = 0;
            }

            #  Hallando las notas del PERIODO 3
            # Calculando las notas del criterio cognitivo periodo 3
            $evaluacionPeriodo3 = $notas->notaEvaluacionPeriodox(3);
            $trimestralPeriodo3 = $notas->notaTrimestralPeriodox(3);
            if (!empty($evaluacionPeriodo3->nota_evaluacion) && !empty($trimestralPeriodo3->nota_trimestral)) {
                $cognitivasTres = $notas->calcularNota($evaluacionPeriodo3->nota_evaluacion, $cognitivo->porcentaje_evaluacion, $trimestralPeriodo3->nota_trimestral, $cognitivo->porcentaje_trimestral, $cognitivo->porcentaje_cognitivo);
                $definitiva_cognitivoTres = $cognitivasTres[0];
            } else {
                $definitiva_cognitivoTres = 0;
            }
            # Calculando las notas del criterio procedimental periodo 2
            $trabajoIndividualPeriodo3 = $notas->notaTindividualPeriodox(3);
            $trabajoColaborativoPeriodo3 = $notas->notaTcolaborativoPeriodox(3);
            if (!empty($trabajoIndividualPeriodo3->nota_Tindividual) && !empty($trabajoColaborativoPeriodo3->nota_Tcolaborativo)) {
                $procedimentalesTres = $notas->calcularNota($trabajoIndividualPeriodo3->nota_Tindividual, $procedimental->porcentaje_Tindividual, $trabajoColaborativoPeriodo3->nota_Tcolaborativo, $procedimental->porcentaje_Tcolaborativo, $procedimental->porcentaje_procedimental);
                $definitiva_procedimentalTres = $procedimentalesTres[0];
            } else {
                $definitiva_procedimentalTres = 0;
            }

            # Calculando notas del criterio actitudiana periodo 3
            $apreciativaPeriodo3 = $notas->notaApreciativaPeriodox(3);
            $autoevaluacionPeriodo3 = $notas->notaAutoevaluacionPeriodox(3);
            if (!empty($apreciativaPeriodo3->nota_apreciativa) && !empty($autoevaluacionPeriodo3->nota_autoevaluacion)) {
                $actitudinalesTres = $notas->calcularNota($apreciativaPeriodo3->nota_apreciativa, $actitudinal->porcentaje_apreciativa, $autoevaluacionPeriodo3->nota_autoevaluacion, $actitudinal->porcentaje_autoevaluacion, $actitudinal->porcentaje_actitudinal);
                $definitiva_actitudinalTres = $actitudinalesTres[0];
            } else {
                $definitiva_actitudinalTres = 0;
            }

            // Hallando la nota definitivia del periodo 3
            if (!empty($apreciativaPeriodo3->nota_apreciativa) && !empty($autoevaluacionPeriodo3->nota_autoevaluacion) && !empty($trabajoIndividualPeriodo3->nota_Tindividual) && !empty($trabajoColaborativoPeriodo3->nota_Tcolaborativo) && !empty($evaluacionPeriodo3->nota_evaluacion) && !empty($trimestralPeriodo3->nota_trimestral)) {
                $definitiva_periodo3 = $notas->definitivaPerido($cognitivasTres[1], $procedimentalesTres[1], $actitudinalesTres[1]);
            } else {
                $definitiva_periodo3 = 0;
            }

            $hoy = date("Y-m-d");
            $periodo = Utils::validarPeriodoAcademico($hoy);

            # metodo para avilitar el boton de borrado

            switch ($periodo) {
                case '1':
                    $uno = '';
                    $dos = 'btn disabled';
                    $tres = 'btn disabled';
                    break;
                case '2':
                    $uno = 'btn disabled';
                    $dos = '';
                    $tres = 'btn disabled';
                    break;
                case '3':
                    $uno = 'btn disabled';
                    $dos = 'btn disabled';
                    $tres = '';
                    break;
            }

            # validar el periodo en el que se está, para insertar la nota definitiva en el periodo correspondiente, solo se actualiza cuando se  registra o se eliminar una nota
            if (isset($_GET['event']) && $_GET['event'] == 'ok') {
                $nota_definitiva = $notas;
                $nota_definitiva->setEstudiante($id_estudiante);
                $nota_definitiva->setMateria($id_materia);
                # definienfo el id del periodo correspondiente y la nota definitiva correspondiente
                switch ($periodo) {
                    case '1':
                        $id_periodo = 1;
                        $definitiva = $definitiva_periodo1;
                        break;
                    case '2':
                        $id_periodo = 2;
                        $definitiva = $definitiva_periodo2;
                        break;
                    case '3':
                        $id_periodo = 3;
                        $definitiva = $definitiva_periodo3;
                        break;
                }
                $nota_definitiva->setNota($definitiva);
                $nota_definitiva->updateFinalNote($id_periodo);
            }

            # Validando el tipo de usurio activo, para redireccionarlo a un vista especifica
            if (isset($_GET['dir']) && $_GET['dir'] == 'ok') {
                require_once 'views/docente/notasDirector.php';
            } elseif (isset($_SESSION['student'])) {
                # Listar las actividades que existen en esta materia
                $actividades = new Actividades();
                $actividades->setMateria($id_materia);
                $listado_actividades = $actividades->listClassActivitys();
                # listar los documentos que existen en la materia
                $documentos = new Documentos();
                $documentos->setId($id_materia);
                $listado_documentos = $documentos->listClassDocuments();
                require_once 'views/estudiante/notas.php';
            } else {
                require_once 'views/docente/notas.php';
            }
        }
    }

    # Registrar notas en los diferentes criterios y actividades
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

        # Validar que halla registrada una sola nota o ningufa, por actividad.
        $validar = $criterios->justANote($estudiante, $nota, $materia, $periodo, $actividad);
        if ($validar) {
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
        } else {
            $mal = false;
            Utils::validarReturn($mal, 'validarNota');
        }
        header('Location: ' . base_url . 'Notas/homeNotas&student=' . Utils::encryption($estudiante) . '&materia=' . Utils::encryption($materia) . '&nGrado=' . $_POST['grado'] . '&event=ok');
    }

    # Metodo para eliminar la nota de una actividad
    public function eliminarNota()
    {
        $actividad = $_GET['activity'];
        $id_nota = $_GET['id'];

        $caneca = new Notas();
        $caneca->setId($id_nota);
        $caneca->setItem($actividad);
        $resultado = $caneca->deleteNote();
        Utils::validarReturn($resultado, 'eliminarNota');
        header('Location: ' . base_url . 'Notas/homeNotas&student=' . Utils::encryption($_GET['e']) . '&materia=' . Utils::encryption($_GET['m']) . '&nGrado=' . $_GET['g'] . '&event=ok');
    }

}
