<?php
require_once 'models/grados.php';
require_once 'models/notas.php';
require_once 'models/boletin.php';
class DirectorController
{
    # vista para los directores de grado
    public function vista_director()
    {
        if (!isset($_GET['subject']) || !isset($_GET['name']) || !isset($_GET['degree']) || !isset($_GET['nombreg'])) {
            Utils::Error404();
        } elseif (empty(Utils::decryption($_GET['subject'])) || empty(Utils::decryption($_GET['degree'])) || empty($_GET['name']) || empty($_GET['nombreg'])) {
            Utils::Error404();
        } else {
            $id_subject = Utils::decryption($_GET['subject']);
            $name_subject = $_GET['name'];
            $id_degree = Utils::decryption($_GET['degree']);
            $name_degree = $_GET['nombreg'];

            $listado = new Grados();
            $listado->setGrado($id_degree);
            $listado_estudiantes = $listado->EstudiantesGrado();

            require_once 'views/docente/homeDirector.php';
        }
    }

    # Registrar nota de comportamiento
    public function nota_comportamiento()
    {
        if (isset($_POST) && !empty($_POST)) {
            $id_estudiante = $_POST['x'];
            $calificacion = $_POST['nota'];
            $observacion = Utils::clearStrings($_POST['observacion']);
            $periodo = Utils::validarPeriodoAcademico(date("Y-m-d"));
            $nota = new Notas();
            $nota->setEstudiante($id_estudiante);
            $nota->setPeriodo($periodo);
            $respuesta = $nota->verificarNotaComportamiento();
            # Instancia para traer las notas de comportamiento de los estudiantes en los periodos academicos
            $boletin = new Boletin();
            $boletin->setIdEstudiante($id_estudiante);
            if ($respuesta) {
                # Notas y datos del  comportamiento de x estudiante
                switch ($periodo) {
                    case '1':
                        $comportamientoUno = $calificacion;
                        $comportamientoDos = 0;
                        $comportamientoTres = 0;
                        break;
                    case '2':
                        $comportamientoUno = $boletin->notaXPeriodo(1)->notaComportamiento;
                        $comportamientoDos = $calificacion;
                        $comportamientoTres = 0;
                        break;
                    case '3':
                        $comportamientoUno = $boletin->notaXPeriodo(1)->notaComportamiento;
                        $comportamientoDos = $boletin->notaXPeriodo(2)->notaComportamiento;
                        $comportamientoTres = $calificacion;
                        break;
                    default:
                        // code...
                        break;
                }
                $nota->setItem($observacion);
                $resultado = $nota->notaComportamiento($comportamientoUno, $comportamientoDos, $comportamientoTres);

                Utils::alertas($resultado, 'Nota de comportamiento registrada con éxito', 'Algo salió mal al intentar registrar la nota de comportamiento, inténtelo de nuevo.');
            } else {
                Utils::alertas($respuesta, '', 'El estudiante ya tiene una nota de comportamiento asignada.');
            }
            header("Location: " . base_url . 'Estudiante/perfilEstudiante&x=' . $id_estudiante . '&y=' . $_POST['y'] . '&z=' . $_POST['z']);
        }
    }

}
