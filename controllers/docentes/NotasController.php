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
        $periodo4 = $notas->notasPeriodo4();
        if (isset($_GET['dir']) && $_GET['dir'] == 'ok') {
            require_once 'views/docente/notasDirector.php';
        } else {
            require_once 'views/docente/notas.php';
        }
    }

    public function registrarNota()
    {
        $materia = $_POST['materia'];
        $estudiante = $_POST['estudiante'];
        $item = $_POST['item'];
        $nota = $_POST['nota'];
        $porcentaje = $_POST['porcentaje'];
        $hoy = date("Y-m-d");
        $fecha_hoy = Utils::validarPeriodoAcademico($hoy);

        $calificar = new Notas();
        $calificar->setMateria($materia);
        $calificar->setEstudiante($estudiante);
        $calificar->setPeriodo($fecha_hoy);
        $calificar->setItem($item);
        $calificar->setNota($nota);
        $calificar->setPorcentaje($porcentaje);
        $validacion = $calificar->validatePercent();

        if ($validacion) {
            $resultado = $calificar->registerNote();
            var_dump($resultado);
        }
        Utils::validarReturn($validacion, 'registrarNota');

        header('Location: ' . base_url . 'Notas/homeNotas&student=' . $estudiante . '&materia=' . $materia . '&nGrado=' . $_POST['grado']);
    }

}
