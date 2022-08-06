<?php
require_once 'models/grados.php';
require_once 'models/notas.php';
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
            $observacion = $_POST['observacion'];
            $periodo = Utils::validarPeriodoAcademico(date("Y-m-d"));
            $nota = new Notas();
            $nota->setEstudiante($id_estudiante);
            $nota->setPeriodo($periodo);
            $respuesta = $nota->verificarNotaComportamiento();
            if ($respuesta) {
                $nota->setItem($observacion);
                $nota->setNota($calificacion);
                $resultado = $nota->notaComportamiento();
                Utils::alertas($resultado, 'Nota de comportamiento registrada con éxito', 'Algo salió mal al intentar registrar la nota de comportamiento, inténtelo de nuevo.');
            } else {
                Utils::alertas($respuesta, '', 'El estudiante ya tiene una nota de comportamiento asignada.');
            }
            header("Location: " . base_url . 'Estudiante/perfilEstudiante&x=' . $id_estudiante . '&y=' . $_POST['y'] . '&z=' . $_POST['z']);
        }
    }

}
